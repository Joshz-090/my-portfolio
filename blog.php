<?php 
require_once 'config/db.php';
include_once 'src/partials/header.php'; 

// Search and Filter logic
$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';

$params = [];
$query = "SELECT * FROM blog_posts WHERE status = 'published'";

if (!empty($search)) {
    $query .= " AND (title LIKE ? OR content LIKE ? OR description LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

if (!empty($category) && $category !== 'all') {
    $query .= " AND category = ?";
    $params[] = $category;
}

$query .= " ORDER BY created_at DESC";

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$posts = $stmt->fetchAll();

// Get unique categories for filters
$categories = ['Inspirational', 'Technical', 'Future Work'];
?>

<div class="max-w-7xl mx-auto px-4 py-12">
    <!-- Header Section -->
    <header class="mb-20 text-center relative">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-64 bg-primary/5 rounded-full blur-3xl -z-10"></div>
        <div class="inline-block px-4 py-1 mb-4 bg-primary/10 rounded-full">
            <span class="text-xs font-bold text-primary uppercase tracking-widest">Engineering Journal</span>
        </div>
        <h1 class="text-5xl md:text-6xl font-black mb-6 tracking-tight">
            Latest <span class="text-primary italic">Insights</span>
        </h1>
        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
            Exploring the boundaries of Software Engineering, Artificial Intelligence, and full-stack development.
        </p>
    </header>

    <!-- Search and Filter -->
    <form action="blog.php" method="GET" class="mb-16 flex flex-col md:flex-row gap-6 items-center justify-between bg-white/40 dark:bg-gray-800/40 backdrop-blur-md p-6 rounded-[2rem] border border-white/20 dark:border-gray-700/30">
        <div class="relative w-full md:w-96 group">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-primary transition-colors"></i>
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search articles..." class="w-full bg-gray-50 dark:bg-dark/50 border border-gray-200 dark:border-gray-700 rounded-2xl py-3 pl-12 pr-4 outline-none focus:ring-2 ring-primary/20 transition-all">
        </div>
        
        <div class="flex flex-wrap justify-center gap-3">
            <a href="blog.php" class="px-6 py-2 <?php echo empty($category) || $category == 'all' ? 'bg-primary text-white' : 'bg-white/50 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300'; ?> rounded-xl font-bold text-sm shadow-lg <?php echo empty($category) || $category == 'all' ? 'shadow-primary/20' : ''; ?> transition-all hover:scale-105 border border-transparent <?php echo empty($category) || $category == 'all' ? '' : 'border-gray-200 dark:border-gray-600'; ?>">All</a>
            
            <?php foreach ($categories as $cat): ?>
                <a href="blog.php?category=<?php echo urlencode($cat); echo !empty($search) ? '&search='.urlencode($search) : ''; ?>" 
                   class="px-6 py-2 <?php echo $category == $cat ? 'bg-primary text-white' : 'bg-white/50 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300'; ?> rounded-xl font-bold text-sm border border-transparent <?php echo $category == $cat ? '' : 'border-gray-200 dark:border-gray-600 hover:bg-white dark:hover:bg-gray-700'; ?> transition-all hover:scale-105 shadow-lg <?php echo $category == $cat ? 'shadow-primary/20' : ''; ?>">
                    <?php echo $cat; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </form>

    <!-- Blog Posts Grid -->
    <div class="grid md:grid-cols-2 gap-10">
        <?php foreach ($posts as $post): ?>
            <article class="group relative flex flex-col bg-white/40 dark:bg-gray-800/40 backdrop-blur-xl rounded-[2.5rem] border border-white/30 dark:border-gray-700/30 overflow-hidden hover:border-primary/40 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary/5">
                <!-- Image Container -->
                <div class="aspect-[16/9] overflow-hidden relative">
                    <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="..." class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 bg-primary/90 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-full">
                            <?php echo htmlspecialchars($post['category']); ?>
                        </span>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="p-8 flex flex-col flex-grow relative z-10">
                    <div class="flex items-center gap-4 text-xs font-bold text-gray-500 dark:text-gray-400 mb-4">
                        <span class="flex items-center gap-1.5">
                            <i class="fa-regular fa-calendar text-primary"></i>
                            <?php echo date('M d, Y', strtotime($post['created_at'])); ?>
                        </span>
                        <span class="w-1 h-1 bg-gray-300 dark:bg-gray-600 rounded-full"></span>
                        <span class="flex items-center gap-1.5">
                            <i class="fa-regular fa-clock text-primary"></i>
                            5 min read
                        </span>
                    </div>

                    <h2 class="text-2xl font-black mb-4 group-hover:text-primary transition-colors leading-tight">
                        <a href="blog-details.php?id=<?php echo $post['id']; ?>">
                            <?php echo htmlspecialchars($post['title']); ?>
                        </a>
                    </h2>

                    <p class="text-gray-600 dark:text-gray-400 mb-8 line-clamp-3 leading-relaxed text-sm font-medium">
                        <?php echo !empty($post['description']) ? htmlspecialchars($post['description']) : strip_tags($post['content']); ?>
                    </p>

                    <div class="mt-auto flex items-center justify-between border-t border-gray-100 dark:border-gray-700/50 pt-6">
                        <div class="flex items-center gap-6 text-sm font-bold">
                            <span class="flex items-center gap-2 text-gray-500">
                                <i class="fa-regular fa-eye"></i>
                                <?php echo $post['views']; ?>
                            </span>
                            <span class="flex items-center gap-2 text-gray-500">
                                <i class="fa-regular fa-heart"></i>
                                <?php echo $post['likes']; ?>
                            </span>
                        </div>
                        <a href="blog-details.php?id=<?php echo $post['id']; ?>" class="inline-flex items-center gap-2 text-primary font-black uppercase text-[10px] tracking-widest group/btn transition-all">
                            Read Story
                            <i class="fa-solid fa-arrow-right group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>

        <?php if (empty($posts)): ?>
            <div class="col-span-full py-32 text-center bg-gray-50/50 dark:bg-gray-800/30 backdrop-blur-sm rounded-[3rem] border border-dashed border-gray-200 dark:border-gray-700">
                <div class="text-6xl mb-6 grayscale opacity-30">✍️</div>
                <h3 class="text-xl font-bold text-gray-400">No articles found matching your criteria.</h3>
                <p class="text-gray-500 mt-2">Try adjusting your filters or search terms.</p>
                <a href="blog.php" class="inline-block mt-6 text-primary font-black uppercase text-xs tracking-widest hover:underline">Clear all filters</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include_once 'src/partials/footer.php'; ?>
