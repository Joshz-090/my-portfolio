<?php
// Configuration for Database Connection

// Check if running on Localhost, CLI, or Live Server
if (!isset($_SERVER['HTTP_HOST']) || 
    $_SERVER['HTTP_HOST'] == 'localhost' || 
    $_SERVER['HTTP_HOST'] == '127.0.0.1' || 
    strpos($_SERVER['HTTP_HOST'], 'localhost:') === 0 || 
    strpos($_SERVER['HTTP_HOST'], '127.0.0.1:') === 0) {
    
    // LOCAL SETTINGS (XAMPP)
    $host = 'localhost';
    $db   = 'eyasu_portfolio';
    $user = 'root';
    $pass = ''; 
} else {
    // LIVE SETTINGS (InfinityFree)
    $host = 'sql203.infinityfree.com'; // IMPORTANT: Get this from InfinityFree "MySQL Hostname"
    $db   = 'if0_40756896_eyasu_portfolio';
    $user = 'if0_40756896';
    $pass = 'Joshz090'; 
}
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
