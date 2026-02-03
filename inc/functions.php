<?php

function getSetting(PDO $pdo, string $key): string {
    $stmt = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
    $stmt->execute([$key]);
    $row = $stmt->fetch();
    return $row ? $row['setting_value'] : '';
}

function setSetting(PDO $pdo, string $key, string $value): void {
    $stmt = $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = ?");
    $stmt->execute([$key, $value, $value]);
}

function getAllChildren(PDO $pdo): array {
    $stmt = $pdo->query("SELECT * FROM children ORDER BY sort_order ASC, id DESC");
    $children = $stmt->fetchAll();

    foreach ($children as &$child) {
        $ps = $pdo->prepare("SELECT * FROM photos WHERE child_id = ? ORDER BY is_main DESC, sort_order ASC, id ASC");
        $ps->execute([$child['id']]);
        $child['photos'] = $ps->fetchAll();
    }

    return $children;
}

function getChild(PDO $pdo, int $id): ?array {
    $stmt = $pdo->prepare("SELECT * FROM children WHERE id = ?");
    $stmt->execute([$id]);
    $child = $stmt->fetch();
    if (!$child) return null;

    $ps = $pdo->prepare("SELECT * FROM photos WHERE child_id = ? ORDER BY is_main DESC, sort_order ASC, id ASC");
    $ps->execute([$id]);
    $child['photos'] = $ps->fetchAll();

    return $child;
}

function uploadPhoto(string $tmpPath, string $originalName): ?string {
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array($ext, $allowed)) return null;

    $filename = uniqid('photo_', true) . '.' . $ext;
    $dest = __DIR__ . '/../uploads/' . $filename;

    if (move_uploaded_file($tmpPath, $dest)) {
        return $filename;
    }
    return null;
}

function deletePhoto(PDO $pdo, int $photoId): bool {
    $stmt = $pdo->prepare("SELECT filename FROM photos WHERE id = ?");
    $stmt->execute([$photoId]);
    $photo = $stmt->fetch();

    if ($photo) {
        $file = __DIR__ . '/../uploads/' . $photo['filename'];
        if (file_exists($file)) unlink($file);
        $pdo->prepare("DELETE FROM photos WHERE id = ?")->execute([$photoId]);
        return true;
    }
    return false;
}

function deleteChild(PDO $pdo, int $id): bool {
    $child = getChild($pdo, $id);
    if (!$child) return false;

    foreach ($child['photos'] as $photo) {
        $file = __DIR__ . '/../uploads/' . $photo['filename'];
        if (file_exists($file)) unlink($file);
    }

    $pdo->prepare("DELETE FROM children WHERE id = ?")->execute([$id]);
    return true;
}

function e(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
