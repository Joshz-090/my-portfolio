<?php
header('Content-Type: application/json');
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$type = $_GET['type'] ?? '';
$id = (int)($_GET['id'] ?? 0);

if (!$id || !in_array($type, ['project', 'blog'])) {
    echo json_encode(['success' => false, 'message' => 'Missing parameters']);
    exit;
}

session_start();

try {
    if ($type === 'project') {
        $sessionKey = "liked_project_" . $id;
        if (isset($_SESSION[$sessionKey])) {
            $stmt = $pdo->prepare("SELECT likes FROM project_stats WHERE project_id = ?");
            $stmt->execute([$id]);
            $newLikes = $stmt->fetchColumn();
            echo json_encode(['success' => true, 'newLikes' => $newLikes, 'alreadyLiked' => true]);
            exit;
        }

        // Ensure stat record exists
        $pdo->prepare("INSERT IGNORE INTO project_stats (project_id, likes) VALUES (?, 0)")->execute([$id]);
        $pdo->prepare("UPDATE project_stats SET likes = likes + 1 WHERE project_id = ?")->execute([$id]);
        
        $_SESSION[$sessionKey] = true;

        $stmt = $pdo->prepare("SELECT likes FROM project_stats WHERE project_id = ?");
        $stmt->execute([$id]);
        $newLikes = $stmt->fetchColumn();
    } else {
        $sessionKey = "liked_blog_" . $id;
        if (isset($_SESSION[$sessionKey])) {
            $stmt = $pdo->prepare("SELECT likes FROM blog_posts WHERE id = ?");
            $stmt->execute([$id]);
            $newLikes = $stmt->fetchColumn();
            echo json_encode(['success' => true, 'newLikes' => $newLikes, 'alreadyLiked' => true]);
            exit;
        }

        $pdo->prepare("UPDATE blog_posts SET likes = likes + 1 WHERE id = ?")->execute([$id]);
        
        $_SESSION[$sessionKey] = true;

        $stmt = $pdo->prepare("SELECT likes FROM blog_posts WHERE id = ?");
        $stmt->execute([$id]);
        $newLikes = $stmt->fetchColumn();
    }

    echo json_encode(['success' => true, 'newLikes' => $newLikes]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
