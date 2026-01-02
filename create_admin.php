<?php
require_once 'config/db.php';

$username = 'joshz-090';
$password = 'Passwordjoshz.090';
$email = 'eyasuzerihun@gmail.com';
$full_name = 'Eyasu Zerihun';

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

try {
    // Delete existing if any
    $pdo->prepare("DELETE FROM admin_users WHERE username = ?")->execute([$username]);
    
    // Insert new
    $stmt = $pdo->prepare("INSERT INTO admin_users (username, password, full_name, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username, $hashed_password, $full_name, $email]);
    
    echo "Admin user '$username' created/updated successfully with the password you provided!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
