<?php
// config/db.php

// Determine environment
$host = $_SERVER['HTTP_HOST'];
$is_local = ($host === 'localhost' || $host === '127.0.0.1' || strpos($host, '192.168') !== false);

if ($is_local) {
    // Local XAMPP/MAMP Settings
    $db_host = 'localhost';
    $db_name = 'port'; 
    $db_user = 'root';
    $db_pass = '';
} else {
    // Production Settings (InfinityFree/Other)
    // USER MUST FILL THESE IN BEFORE UPLOADING
    $db_host = 'sql206.infinityfree.com'; // Example host, user needs to check vPanel
    $db_name = 'if0_38012674_port';       // Example DB name
    $db_user = 'if0_38012674';            // Example user
    $db_pass = 'YOUR_V_PANEL_PASSWORD';   // User needs to update this
}

try {
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
    
} catch (PDOException $e) {
    // Only show detailed error if local or debugging
    if ($is_local || isset($_GET['debug'])) {
        die("Database Connection Failed: " . $e->getMessage());
    } else {
        // Generic error for production security
        die("Database connection error. Please check your configuration.");
    }
}
?>
