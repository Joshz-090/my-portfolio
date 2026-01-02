<?php
// Mock HTTP_HOST for CLI
if (php_sapi_name() === 'cli' || !isset($_SERVER['HTTP_HOST'])) {
    $_SERVER['HTTP_HOST'] = 'localhost:8080';
}
require_once __DIR__ . '/config/db.php';

try {
    // Check if column exists first to avoid error on repeated runs
    $check = $pdo->prepare("SHOW COLUMNS FROM testimonials LIKE 'image_url'");
    $check->execute();
    if ($check->rowCount() == 0) {
        $sql = "ALTER TABLE testimonials ADD COLUMN image_url VARCHAR(255) DEFAULT NULL";
        $pdo->exec($sql);
        echo "Column 'image_url' added successfully.\n";
    } else {
        echo "Column 'image_url' already exists.\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
