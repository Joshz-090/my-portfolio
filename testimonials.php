<?php 
require_once 'config/db.php';
require_once 'src/helpers/CloudinaryUploader.php';

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $role = htmlspecialchars($_POST['role']);
    $content = htmlspecialchars($_POST['content']);
    $image_url = null;

    // Handle Image Upload or Link
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        $uploadedUrl = CloudinaryUploader::upload($_FILES['image_file']);
        if ($uploadedUrl) {
            $image_url = $uploadedUrl;
        }
    } elseif (!empty($_POST['image_link'])) {
        $image_url = htmlspecialchars($_POST['image_link']);
    }

    // Default Avatar if none provided
    if (!$image_url) {
        $image_url = "https://ui-avatars.com/api/?name=" . urlencode($name) . "&background=random";
    }

    if ($name && $content) {
        $stmt = $pdo->prepare("INSERT INTO testimonials (name, role, content, image_url, status) VALUES (?, ?, ?, ?, 'pending')");
        $stmt->execute([$name, $role, $content, $image_url]);
        $success = true;
    }
}

// Fetch approved testimonials
$stmt = $pdo->query("SELECT * FROM testimonials WHERE status = 'approved' ORDER BY created_at DESC");
$testimonials = $stmt->fetchAll();

include_once 'src/partials/header.php'; 
?>

<div class="max-w-7xl mx-auto px-4 py-12">
    <header class="text-center mb-16">
        <h1 class="text-4xl font-bold mb-4">What People <span class="text-primary">Say</span></h1>
        <p class="text-gray-600 dark:text-gray-400">Feedback and testimonials from collaborators and clients.</p>
    </header>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20 text-center">
        <?php foreach ($testimonials as $t): ?>
            <div class="p-8 glass rounded-3xl border border-gray-200 dark:border-gray-800 relative flex flex-col items-center text-center hover:scale-105 transition-transform duration-300">
                <div class="absolute top-4 left-6 text-6xl text-primary/20 font-serif">"</div>
                
                <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white dark:border-gray-700 shadow-lg mb-6 relative z-10">
                    <img src="<?php echo htmlspecialchars($t['image_url'] ?? 'https://ui-avatars.com/api/?name='.urlencode($t['name'])); ?>" 
                         alt="<?php echo htmlspecialchars($t['name']); ?>" 
                         class="w-full h-full object-cover">
                </div>
                
                <p class="text-gray-600 dark:text-gray-300 mb-6 italic relative z-10">
                    <?php echo nl2br(htmlspecialchars($t['content'])); ?>
                </p>
                
                <h4 class="font-bold text-lg text-gray-900 dark:text-white"><?php echo htmlspecialchars($t['name']); ?></h4>
                <p class="text-sm text-primary font-medium"><?php echo htmlspecialchars($t['role']); ?></p>
            </div>
        <?php endforeach; ?>
        <?php if (empty($testimonials)): ?>
            <p class="col-span-full text-gray-400">Be the first to leave a testimonial!</p>
        <?php endif; ?>
    </div>

    <!-- Submission Form -->
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900 p-8 rounded-3xl border border-gray-200 dark:border-gray-800 shadow-2xl">
        <h2 class="text-2xl font-bold mb-6 text-center">Leave a Testimonial</h2>
        <?php if ($success): ?>
            <div class="bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 p-4 rounded-xl mb-6 text-center">
                Thank you! Your testimonial has been submitted and is awaiting approval.
            </div>
        <?php endif; ?>
        <form action="testimonials.php" method="POST" enctype="multipart/form-data" class="space-y-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" name="name" required class="w-full bg-gray-50 dark:bg-dark border border-gray-200 dark:border-gray-800 rounded-xl px-4 py-3 focus:ring-2 ring-primary outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Role / Company</label>
                    <input type="text" name="role" placeholder="CEO, Developer, etc" class="w-full bg-gray-50 dark:bg-dark border border-gray-200 dark:border-gray-800 rounded-xl px-4 py-3 focus:ring-2 ring-primary outline-none transition-all">
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-b border-gray-100 dark:border-gray-800 py-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Upload Photo</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                </div>
                <div class="flex items-center justify-center">
                    <span class="text-xs text-gray-400 uppercase font-bold px-2">OR</span>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Photo Link</label>
                    <input type="url" name="image_link" placeholder="https://example.com/photo.jpg" class="w-full bg-gray-50 dark:bg-dark border border-gray-200 dark:border-gray-800 rounded-xl px-4 py-3 focus:ring-2 ring-primary outline-none transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Testimonial</label>
                <textarea name="content" required rows="4" class="w-full bg-gray-50 dark:bg-dark border border-gray-200 dark:border-gray-800 rounded-xl px-4 py-3 focus:ring-2 ring-primary outline-none transition-all"></textarea>
            </div>
            <button type="submit" class="w-full bg-primary hover:bg-blue-600 text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-primary/30">
                Submit Testimonial
            </button>
        </form>
    </div>
</div>

<?php include_once 'src/partials/footer.php'; ?>
