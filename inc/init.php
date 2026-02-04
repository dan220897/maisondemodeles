<?php
require_once __DIR__ . '/db.php';

$pdo->exec("
    CREATE TABLE IF NOT EXISTS settings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        setting_key VARCHAR(100) UNIQUE NOT NULL,
        setting_value TEXT NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

$pdo->exec("
    CREATE TABLE IF NOT EXISTS pages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        slug VARCHAR(100) UNIQUE NOT NULL,
        brand_name VARCHAR(255) NOT NULL,
        hero_text VARCHAR(500) DEFAULT '',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

$pdo->exec("
    CREATE TABLE IF NOT EXISTS children (
        id INT AUTO_INCREMENT PRIMARY KEY,
        page_id INT DEFAULT NULL,
        name VARCHAR(255) NOT NULL,
        age INT DEFAULT NULL,
        height INT NOT NULL,
        params TEXT DEFAULT NULL,
        sort_order INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (page_id) REFERENCES pages(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

$pdo->exec("
    CREATE TABLE IF NOT EXISTS photos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        child_id INT NOT NULL,
        filename VARCHAR(255) NOT NULL,
        is_main TINYINT(1) DEFAULT 0,
        sort_order INT DEFAULT 0,
        FOREIGN KEY (child_id) REFERENCES children(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Add page_id column if missing (migration for existing installs)
try {
    $pdo->exec("ALTER TABLE children ADD COLUMN page_id INT DEFAULT NULL AFTER id");
} catch (PDOException $e) {
    // Column already exists
}

try {
    $pdo->exec("ALTER TABLE children ADD FOREIGN KEY (page_id) REFERENCES pages(id) ON DELETE CASCADE");
} catch (PDOException $e) {
    // FK already exists
}

$stmt = $pdo->prepare("INSERT IGNORE INTO settings (setting_key, setting_value) VALUES (?, ?)");
$stmt->execute(['pin_code', '0000']);

// Create default page if none exist
$pageCount = $pdo->query("SELECT COUNT(*) FROM pages")->fetchColumn();
if ($pageCount == 0) {
    $pdo->prepare("INSERT INTO pages (slug, brand_name, hero_text) VALUES (?, ?, ?)")
        ->execute(['main', 'Maison de Modèles', 'Откройте мир моды для вашего ребёнка']);
    $defaultPageId = (int)$pdo->lastInsertId();
    // Assign orphan children to default page
    $pdo->prepare("UPDATE children SET page_id = ? WHERE page_id IS NULL")->execute([$defaultPageId]);
}
