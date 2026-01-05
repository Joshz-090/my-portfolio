<?php
// admin/debug_env.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Environment Debugger</h1>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo "<hr>";

// 1. Check Include Paths
echo "<h2>1. File Inclusion Check</h2>";
$files_to_check = [
    '../config/db.php',
    '../src/helpers/CloudinaryUploader.php',
    'auth_check.php'
];

foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        echo "✅ Found: $file<br>";
        try {
            require_once $file;
            echo "✅ Included: $file<br>";
        } catch (Throwable $e) {
            echo "❌ Error including $file: " . $e->getMessage() . "<br>";
        }
    } else {
        echo "❌ Missing: $file (Path: " . realpath($file) . ")<br>";
    }
}
echo "<hr>";

// 2. Check Database Connection
echo "<h2>2. Database Connection Check</h2>";
if (isset($pdo)) {
    echo "✅ \$pdo variable exists.<br>";
    try {
        $stmt = $pdo->query("SELECT 1");
        echo "✅ Database connection successful!<br>";
    } catch (PDOException $e) {
        echo "❌ Database Query Failed: " . $e->getMessage() . "<br>";
    }
} else {
    echo "❌ \$pdo variable NOT found. Database connection failed.<br>";
}

// 3. Check Cloudinary
echo "<h2>3. Cloudinary Class Check</h2>";
if (class_exists('CloudinaryUploader')) {
    echo "✅ CloudinaryUploader class loaded.<br>";
} else {
    echo "❌ CloudinaryUploader class NOT loaded.<br>";
}

echo "<hr>";
echo "<h3>Next Steps</h3>";
echo "If you see ❌ marks above, that is the cause of your 500 error.<br>";
echo "1. If DB fails: Check your credentials in config/db.php.<br>";
echo "2. If Files fail: Check the lowercase/uppercase filenames on your server.<br>";
?>
