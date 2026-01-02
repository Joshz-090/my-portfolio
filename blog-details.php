<?php 
require_once 'config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: blog.php'); exit; }

// Fetch post
$stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE id = ? AND status = 'published'");
$stmt->execute([$id]);
$post = $stmt->fetch();

if (!$post) { header('Location: blog.php'); exit; }

// Increment views
$pdo->prepare("UPDATE blog_posts SET views = views + 1 WHERE id = ?")->execute([$id]);

// Fetch gallery images
$stmt = $pdo->prepare("SELECT * FROM blog_post_images WHERE post_id = ?");
$stmt->execute([$id]);
$gallery = $stmt->fetchAll();

// Handle comments
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);
    if ($name && $comment) {
        $stmt = $pdo->prepare("INSERT INTO blog_comments (post_id, name, comment) VALUES (?, ?, ?)");
        $stmt->execute([$id, $name, $comment]);
    }
}

// Fetch comments
$stmt = $pdo->prepare("SELECT * FROM blog_comments WHERE post_id = ? ORDER BY created_at DESC");
$stmt->execute([$id]);
$comments = $stmt->fetchAll();

include_once 'src/partials/header.php'; 
?>

<div class="max-w-5xl mx-auto px-4 py-20">
    <!-- Breadcrumb & Category -->
    <div class="flex items-center justify-between mb-12">
        <a href="blog.php" class="inline-flex items-center gap-2 text-sm font-black uppercase tracking-widest text-gray-500 hover:text-primary transition-colors group">
            <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            Back to Journal
        </a>
        <span class="px-4 py-1.5 bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest rounded-full">
            <?php echo $post['category']; ?>
        </span>
    </div>

    <!-- Header -->
    <header class="mb-16">
        <div class="flex items-center gap-4 text-xs font-bold text-gray-400 mb-6">
            <span class="flex items-center gap-2">
                <i class="fa-regular fa-calendar"></i>
                <?php echo date('M d, Y', strtotime($post['created_at'])); ?>
            </span>
            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
            <span class="flex items-center gap-2">
                <i class="fa-regular fa-clock"></i>
                5 min read
            </span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-8 leading-[1.1] tracking-tight text-gray-900 dark:text-white">
            <?php echo htmlspecialchars($post['title']); ?>
        </h1>
        <?php if (!empty($post['description'])): ?>
            <p class="text-xl md:text-2xl text-gray-500 dark:text-gray-400 font-medium leading-relaxed italic border-l-4 border-primary/20 pl-8 py-2">
                "<?php echo htmlspecialchars($post['description']); ?>"
            </p>
        <?php endif; ?>
    </header>

    <!-- Main Image -->
    <div class="aspect-[21/9] rounded-[3rem] overflow-hidden bg-gray-100 dark:bg-gray-800 mb-20 shadow-2xl relative group">
        <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="..." class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
    </div>

    <!-- Content -->
    <article class="prose prose-lg dark:prose-invert max-w-none mb-24 leading-relaxed text-gray-800 dark:text-gray-300 font-medium">
        <?php echo nl2br($post['content']); ?>
    </article>

    <!-- Image Gallery -->
    <?php if (!empty($gallery)): ?>
        <section class="mb-24">
            <h3 class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-10 text-center">Visual Breakdown</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php foreach ($gallery as $img): ?>
                    <div class="aspect-square rounded-[2rem] overflow-hidden border border-gray-100 dark:border-gray-800 hover:border-primary/30 transition-all group">
                        <img src="<?php echo htmlspecialchars($img['image_url']); ?>" alt="Gallery" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- Interactions -->
    <div class="flex items-center justify-center gap-12 py-12 border-y border-gray-100 dark:border-gray-800 mb-24">
        <button class="flex items-center gap-3 text-sm font-black text-gray-500 hover:text-primary transition-all group">
            <i class="fa-regular fa-eye text-xl"></i>
            <span><?php echo $post['views'] + 1; ?> Iterations</span>
        </button>
        <button class="flex items-center gap-3 text-sm font-black text-gray-500 hover:text-red-500 transition-all group">
            <i class="fa-regular fa-heart text-xl group-hover:scale-125 transition-transform"></i>
            <span><?php echo $post['likes']; ?> Appreciations</span>
        </button>
    </div>

    <!-- Comments Section -->
    <section id="comments" class="max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-12">
            <h3 class="text-3xl font-black">Discussions</h3>
            <span class="px-4 py-1 bg-gray-100 dark:bg-gray-800 text-gray-500 text-xs font-bold rounded-full">
                <?php echo count($comments); ?> Thoughts
            </span>
        </div>
        
        <form action="" method="POST" class="mb-20 space-y-6 bg-white/40 dark:bg-gray-800/40 backdrop-blur-xl p-10 rounded-[2.5rem] border border-white/40 dark:border-gray-700/30">
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-2">Identity</label>
                <input type="text" name="name" placeholder="How should I address you?" required class="w-full bg-gray-50 dark:bg-dark/50 border border-gray-200 dark:border-gray-700 rounded-2xl px-6 py-4 outline-none focus:ring-2 ring-primary/20 transition-all font-medium">
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-2">Perspective</label>
                <textarea name="comment" placeholder="What's your take on this?" required rows="4" class="w-full bg-gray-50 dark:bg-dark/50 border border-gray-200 dark:border-gray-700 rounded-2xl px-6 py-4 outline-none focus:ring-2 ring-primary/20 transition-all font-medium"></textarea>
            </div>
            <button type="submit" name="submit_comment" class="bg-primary text-white w-full py-5 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-blue-600 transition-all shadow-xl shadow-primary/20 active:scale-95">
                Share Perspective
            </button>
        </form>

        <div class="space-y-8">
            <?php foreach ($comments as $c): ?>
                <div class="p-8 bg-white/40 dark:bg-gray-800/20 backdrop-blur-sm rounded-[2rem] border border-white/30 dark:border-gray-800/50 hover:border-primary/20 transition-all">
                    <div class="flex justify-between items-center mb-4">
                        <span class="font-black text-gray-900 dark:text-white uppercase tracking-wider text-xs"><?php echo htmlspecialchars($c['name']); ?></span>
                        <span class="text-[9px] text-gray-400 font-black uppercase tracking-widest"><?php echo date('M d, Y', strtotime($c['created_at'])); ?></span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed font-medium"><?php echo nl2br(htmlspecialchars($c['comment'])); ?></p>
                </div>
            <?php endforeach; ?>
            
            <?php if (empty($comments)): ?>
                <div class="text-center py-20 bg-gray-50/50 dark:bg-gray-900/10 rounded-[3rem] border border-dashed border-gray-200 dark:border-gray-800">
                    <div class="text-4xl mb-4 grayscale opacity-20">💭</div>
                    <p class="text-gray-400 font-bold">The conversation hasn't started yet.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php include_once 'src/partials/footer.php'; ?>


<?php include_once 'src/partials/footer.php'; ?>
