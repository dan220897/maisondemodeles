<?php
session_start();
require_once __DIR__ . '/inc/init.php';
require_once __DIR__ . '/inc/functions.php';

header('Content-Type: application/json; charset=utf-8');

$action = $_POST['action'] ?? $_GET['action'] ?? '';

// Public actions
if ($action === 'get_children') {
    echo json_encode(['success' => true, 'children' => getAllChildren($pdo)]);
    exit;
}

if ($action === 'get_child') {
    $id = (int)($_GET['id'] ?? 0);
    $child = getChild($pdo, $id);
    if ($child) {
        echo json_encode(['success' => true, 'child' => $child]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Не найден']);
    }
    exit;
}

if ($action === 'get_settings') {
    echo json_encode([
        'success' => true,
        'brand_name' => getSetting($pdo, 'brand_name'),
        'hero_text' => getSetting($pdo, 'hero_text'),
    ]);
    exit;
}

// PIN check
if ($action === 'check_pin') {
    $pin = $_POST['pin'] ?? '';
    $stored = getSetting($pdo, 'pin_code');
    if ($pin === $stored) {
        $_SESSION['admin'] = true;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Неверный пин-код']);
    }
    exit;
}

// Admin guard
if (empty($_SESSION['admin'])) {
    echo json_encode(['success' => false, 'error' => 'Нет доступа']);
    exit;
}

// Admin actions
if ($action === 'save_settings') {
    $brand = $_POST['brand_name'] ?? '';
    $hero = $_POST['hero_text'] ?? '';
    $pin = $_POST['pin_code'] ?? '';

    if ($brand !== '') setSetting($pdo, 'brand_name', $brand);
    if ($hero !== '') setSetting($pdo, 'hero_text', $hero);
    if ($pin !== '') setSetting($pdo, 'pin_code', $pin);

    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'add_child') {
    $name = trim($_POST['name'] ?? '');
    $age = (int)($_POST['age'] ?? 0);
    $height = (int)($_POST['height'] ?? 0);
    $params = trim($_POST['params'] ?? '');

    if ($name === '' || $height <= 0) {
        echo json_encode(['success' => false, 'error' => 'Заполните обязательные поля']);
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO children (name, age, height, params) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $age, $height, $params]);
    $childId = (int)$pdo->lastInsertId();

    if (!empty($_FILES['photos'])) {
        $files = $_FILES['photos'];
        $count = is_array($files['name']) ? count($files['name']) : 0;
        for ($i = 0; $i < $count; $i++) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                $filename = uploadPhoto($files['tmp_name'][$i], $files['name'][$i]);
                if ($filename) {
                    $isMain = ($i === 0) ? 1 : 0;
                    $pdo->prepare("INSERT INTO photos (child_id, filename, is_main, sort_order) VALUES (?, ?, ?, ?)")
                        ->execute([$childId, $filename, $isMain, $i]);
                }
            }
        }
    }

    echo json_encode(['success' => true, 'id' => $childId]);
    exit;
}

if ($action === 'update_child') {
    $id = (int)($_POST['id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $age = (int)($_POST['age'] ?? 0);
    $height = (int)($_POST['height'] ?? 0);
    $params = trim($_POST['params'] ?? '');

    if ($id <= 0 || $name === '') {
        echo json_encode(['success' => false, 'error' => 'Неверные данные']);
        exit;
    }

    $pdo->prepare("UPDATE children SET name = ?, age = ?, height = ?, params = ? WHERE id = ?")
        ->execute([$name, $age, $height, $params, $id]);

    if (!empty($_FILES['photos'])) {
        $files = $_FILES['photos'];
        $count = is_array($files['name']) ? count($files['name']) : 0;

        $maxSort = $pdo->prepare("SELECT COALESCE(MAX(sort_order), 0) FROM photos WHERE child_id = ?");
        $maxSort->execute([$id]);
        $order = (int)$maxSort->fetchColumn();

        for ($i = 0; $i < $count; $i++) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                $filename = uploadPhoto($files['tmp_name'][$i], $files['name'][$i]);
                if ($filename) {
                    $order++;
                    $pdo->prepare("INSERT INTO photos (child_id, filename, is_main, sort_order) VALUES (?, ?, 0, ?)")
                        ->execute([$id, $filename, $order]);
                }
            }
        }
    }

    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'delete_child') {
    $id = (int)($_POST['id'] ?? 0);
    deleteChild($pdo, $id);
    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'delete_photo') {
    $id = (int)($_POST['id'] ?? 0);
    deletePhoto($pdo, $id);
    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'set_main_photo') {
    $photoId = (int)($_POST['photo_id'] ?? 0);
    $childId = (int)($_POST['child_id'] ?? 0);

    $pdo->prepare("UPDATE photos SET is_main = 0 WHERE child_id = ?")->execute([$childId]);
    $pdo->prepare("UPDATE photos SET is_main = 1 WHERE id = ? AND child_id = ?")->execute([$photoId, $childId]);

    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'logout') {
    unset($_SESSION['admin']);
    echo json_encode(['success' => true]);
    exit;
}

if ($action === 'reorder_child') {
    $id = (int)($_POST['id'] ?? 0);
    $direction = $_POST['direction'] ?? '';

    if ($id <= 0 || !in_array($direction, ['up', 'down'])) {
        echo json_encode(['success' => false, 'error' => 'Неверные данные']);
        exit;
    }

    $current = $pdo->prepare("SELECT id, sort_order FROM children WHERE id = ?");
    $current->execute([$id]);
    $currentChild = $current->fetch();
    if (!$currentChild) {
        echo json_encode(['success' => false, 'error' => 'Не найден']);
        exit;
    }

    $currentOrder = (int)$currentChild['sort_order'];

    if ($direction === 'up') {
        $neighbor = $pdo->prepare("SELECT id, sort_order FROM children WHERE sort_order < ? ORDER BY sort_order DESC, id DESC LIMIT 1");
        $neighbor->execute([$currentOrder]);
    } else {
        $neighbor = $pdo->prepare("SELECT id, sort_order FROM children WHERE sort_order > ? ORDER BY sort_order ASC, id ASC LIMIT 1");
        $neighbor->execute([$currentOrder]);
    }

    $neighborChild = $neighbor->fetch();

    if ($neighborChild) {
        $neighborOrder = (int)$neighborChild['sort_order'];
        if ($neighborOrder === $currentOrder) {
            // Same sort_order, assign distinct values
            if ($direction === 'up') {
                $pdo->prepare("UPDATE children SET sort_order = sort_order - 1 WHERE id = ?")->execute([$id]);
            } else {
                $pdo->prepare("UPDATE children SET sort_order = sort_order + 1 WHERE id = ?")->execute([$id]);
            }
        } else {
            $pdo->prepare("UPDATE children SET sort_order = ? WHERE id = ?")->execute([$neighborOrder, $id]);
            $pdo->prepare("UPDATE children SET sort_order = ? WHERE id = ?")->execute([$currentOrder, $neighborChild['id']]);
        }
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Нельзя переместить']);
    }
    exit;
}

echo json_encode(['success' => false, 'error' => 'Неизвестное действие']);
