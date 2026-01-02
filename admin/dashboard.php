<?php 
require_once 'auth_check.php';
require_once '../config/db.php';

// Fetch quick stats
$projectCount = $pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn();
$blogCount = $pdo->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn();
$messageCount = $pdo->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
$pendingTestimonials = $pdo->query("SELECT COUNT(*) FROM testimonials WHERE status = 'pending'")->fetchColumn();

include_once 'header.php'; // Admin header
?>

<div class="px-6 py-8">
    <h1 class="text-2xl font-bold mb-8">Dashboard Overview</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
            <div class="text-sm font-medium text-gray-500">Total Projects</div>
            <div class="text-3xl font-bold text-blue-600 mt-1"><?php echo $projectCount; ?></div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
            <div class="text-sm font-medium text-gray-500">Blog Posts</div>
            <div class="text-3xl font-bold text-green-600 mt-1"><?php echo $blogCount; ?></div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
            <div class="text-sm font-medium text-gray-500">New Messages</div>
            <div class="text-3xl font-bold text-purple-600 mt-1"><?php echo $messageCount; ?></div>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
            <div class="text-sm font-medium text-gray-500">Pending Testimonials</div>
            <div class="text-3xl font-bold text-orange-600 mt-1"><?php echo $pendingTestimonials; ?></div>
        </div>
    </div>

    <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Messages -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                <h2 class="font-bold">Recent Messages</h2>
                <a href="messages.php" class="text-sm text-blue-600">View All</a>
            </div>
            <div class="p-6">
                <?php
                $messages = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5")->fetchAll();
                foreach ($messages as $msg): 
                ?>
                    <div class="py-3 border-b border-gray-50 last:border-0">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-semibold text-sm"><?php echo htmlspecialchars($msg['name']); ?></span>
                            <span class="text-[10px] text-gray-400"><?php echo date('M d, H:i', strtotime($msg['created_at'])); ?></span>
                        </div>
                        <p class="text-xs text-gray-500 truncate"><?php echo htmlspecialchars($msg['message']); ?></p>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($messages)): ?>
                    <p class="text-sm text-gray-400">No messages yet.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <h2 class="font-bold mb-6">Quick Actions</h2>
            <div class="grid grid-cols-2 gap-4">
                <a href="manage_projects.php?action=add" class="flex flex-col items-center justify-center p-6 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors border border-dashed border-gray-300">
                    <span class="text-2xl mb-2">➕</span>
                    <span class="text-sm font-medium">Add Project</span>
                </a>
                <a href="manage_blog.php?action=add" class="flex flex-col items-center justify-center p-6 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors border border-dashed border-gray-300">
                    <span class="text-2xl mb-2">📝</span>
                    <span class="text-sm font-medium">Add Post</span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
