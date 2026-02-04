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

// === Pages ===

function getAllPages(PDO $pdo): array {
    return $pdo->query("SELECT * FROM pages ORDER BY id ASC")->fetchAll();
}

function getPageBySlug(PDO $pdo, string $slug): ?array {
    $stmt = $pdo->prepare("SELECT * FROM pages WHERE slug = ?");
    $stmt->execute([$slug]);
    $page = $stmt->fetch();
    return $page ?: null;
}

function getPageById(PDO $pdo, int $id): ?array {
    $stmt = $pdo->prepare("SELECT * FROM pages WHERE id = ?");
    $stmt->execute([$id]);
    $page = $stmt->fetch();
    return $page ?: null;
}

function generateSlug(string $name): string {
    $slug = mb_strtolower($name, 'UTF-8');
    $translit = [
        'а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'yo',
        'ж'=>'zh','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m',
        'н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u',
        'ф'=>'f','х'=>'h','ц'=>'ts','ч'=>'ch','ш'=>'sh','щ'=>'sch',
        'ъ'=>'','ы'=>'y','ь'=>'','э'=>'e','ю'=>'yu','я'=>'ya',
        ' '=>'-','_'=>'-',
    ];
    $slug = strtr($slug, $translit);
    $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug ?: 'page-' . time();
}

function uniqueSlug(PDO $pdo, string $slug, int $excludeId = 0): string {
    $base = $slug;
    $i = 1;
    while (true) {
        $stmt = $pdo->prepare("SELECT id FROM pages WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $excludeId]);
        if (!$stmt->fetch()) return $slug;
        $slug = $base . '-' . (++$i);
    }
}

// === Children ===

function getChildrenByPage(PDO $pdo, int $pageId): array {
    $stmt = $pdo->prepare("SELECT * FROM children WHERE page_id = ? ORDER BY sort_order ASC, id DESC");
    $stmt->execute([$pageId]);
    $children = $stmt->fetchAll();

    foreach ($children as &$child) {
        $ps = $pdo->prepare("SELECT * FROM photos WHERE child_id = ? ORDER BY is_main DESC, sort_order ASC, id ASC");
        $ps->execute([$child['id']]);
        $child['photos'] = $ps->fetchAll();
    }

    return $children;
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

function duplicatePage(PDO $pdo, int $pageId): ?int {
    $page = getPageById($pdo, $pageId);
    if (!$page) return null;

    $newSlug = uniqueSlug($pdo, $page['slug'] . '-copy');
    $pdo->prepare("INSERT INTO pages (slug, brand_name, hero_text) VALUES (?, ?, ?)")
        ->execute([$newSlug, $page['brand_name'] . ' (копия)', $page['hero_text']]);
    $newPageId = (int)$pdo->lastInsertId();

    // Copy children
    $children = getChildrenByPage($pdo, $pageId);
    foreach ($children as $child) {
        $pdo->prepare("INSERT INTO children (page_id, name, age, height, params, sort_order) VALUES (?, ?, ?, ?, ?, ?)")
            ->execute([$newPageId, $child['name'], $child['age'], $child['height'], $child['params'], $child['sort_order']]);
        $newChildId = (int)$pdo->lastInsertId();

        // Copy photos (files are shared, not duplicated)
        foreach ($child['photos'] as $photo) {
            // Copy file
            $ext = pathinfo($photo['filename'], PATHINFO_EXTENSION);
            $newFilename = uniqid('photo_', true) . '.' . $ext;
            $src = __DIR__ . '/../uploads/' . $photo['filename'];
            $dst = __DIR__ . '/../uploads/' . $newFilename;
            if (file_exists($src)) {
                copy($src, $dst);
            }
            $pdo->prepare("INSERT INTO photos (child_id, filename, is_main, sort_order) VALUES (?, ?, ?, ?)")
                ->execute([$newChildId, $newFilename, $photo['is_main'], $photo['sort_order']]);
        }
    }

    return $newPageId;
}

function e(?string $str): string {
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}
