<?php
require_once 'auth_check.php';
require_once '../config/db.php';
require_once '../src/helpers/CloudinaryUploader.php';

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save_post'])) {
        $title = $_POST['title'];
        $description = $_POST['description']; // New field
        $content = $_POST['content'];
        $category = $_POST['category'];
        $status = $_POST['status'];
        
        // Handle Main Image (Primary)
        $image_url = $_POST['existing_image_url'] ?? '';
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedUrl = CloudinaryUploader::upload($_FILES['image_file']);
            if ($uploadedUrl) { $image_url = $uploadedUrl; }
        } elseif (!empty($_POST['image_link'])) {
            $image_url = $_POST['image_link'];
        }

        if ($id) {
            $stmt = $pdo->prepare("UPDATE blog_posts SET title=?, description=?, content=?, category=?, image_url=?, status=? WHERE id=?");
            $stmt->execute([$title, $description, $content, $category, $image_url, $status, $id]);
            $post_id = $id;
            $message = "Post updated successfully!";
        } else {
            $stmt = $pdo->prepare("INSERT INTO blog_posts (title, description, content, category, image_url, status) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $description, $content, $category, $image_url, $status]);
            $post_id = $pdo->lastInsertId();
            $message = "Post added successfully!";
        }

        // Handle Gallery Images (Multiple)
        // First delete existing if editing (or just sync)
        if ($id) {
            $pdo->prepare("DELETE FROM blog_post_images WHERE post_id = ?")->execute([$id]);
        }

        if (isset($_POST['gallery_links'])) {
            foreach ($_POST['gallery_links'] as $link) {
                if (!empty($link)) {
                    $pdo->prepare("INSERT INTO blog_post_images (post_id, image_url) VALUES (?, ?)")->execute([$post_id, $link]);
                }
            }
        }

        if (isset($_FILES['gallery_files'])) {
            foreach ($_FILES['gallery_files']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['gallery_files']['error'][$key] === UPLOAD_ERR_OK) {
                    $file = [
                        'tmp_name' => $tmp_name,
                        'name' => $_FILES['gallery_files']['name'][$key],
                        'type' => $_FILES['gallery_files']['type'][$key],
                        'size' => $_FILES['gallery_files']['size'][$key],
                        'error' => $_FILES['gallery_files']['error'][$key]
                    ];
                    $uploadedUrl = CloudinaryUploader::upload($file);
                    if ($uploadedUrl) {
                        $pdo->prepare("INSERT INTO blog_post_images (post_id, image_url) VALUES (?, ?)")->execute([$post_id, $uploadedUrl]);
                    }
                }
            }
        }

        $action = 'list';
    } elseif (isset($_POST['delete_post']) && $id) {
        // Delete gallery images first
        $pdo->prepare("DELETE FROM blog_post_images WHERE post_id = ?")->execute([$id]);
        
        // Delete the post
        $stmt = $pdo->prepare("DELETE FROM blog_posts WHERE id = ?");
        $stmt->execute([$id]);
        
        $message = "Post deleted successfully!";
        $action = 'list';
    }
}

$posts = $pdo->query("SELECT * FROM blog_posts ORDER BY created_at DESC")->fetchAll();

if ($action === 'edit' && $id) {
    $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE id = ?");
    $stmt->execute([$id]);
    $post = $stmt->fetch();

    $stmt = $pdo->prepare("SELECT * FROM blog_post_images WHERE post_id = ?");
    $stmt->execute([$id]);
    $gallery = $stmt->fetchAll();
}

include_once 'header.php';
?>

<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Manage Blog Posts</h1>
        <?php if ($action === 'list'): ?>
            <a href="?action=add" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold text-sm hover:bg-blue-700 transition-all">+ Add New Post</a>
        <?php endif; ?>
    </div>

    <?php if ($message): ?>
        <div class="bg-green-50 text-green-600 p-4 rounded-xl mb-6 text-sm font-medium border border-green-100"><?php echo $message; ?></div>
    <?php endif; ?>

    <?php if ($action === 'list'): ?>
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Title</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Category</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Views</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php foreach ($posts as $ps): ?>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-800"><?php echo htmlspecialchars($ps['title']); ?></td>
                            <td class="px-6 py-4 text-sm text-gray-500"><?php echo htmlspecialchars($ps['category']); ?></td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-[10px] uppercase font-bold rounded <?php echo $ps['status'] === 'published' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600'; ?>">
                                    <?php echo $ps['status']; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400"><?php echo $ps['views']; ?></td>
                            <td class="px-6 py-4 flex space-x-3">
                                <a href="?action=edit&id=<?php echo $ps['id']; ?>" class="text-blue-600 hover:underline text-sm font-medium">Edit</a>
                                <form method="POST" action="?action=delete&id=<?php echo $ps['id']; ?>" onsubmit="return confirm('Really delete?');">
                                    <button type="submit" name="delete_post" class="text-red-500 hover:underline text-sm font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <!-- Add/Edit Form -->
        <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm max-w-5xl">
            <form action="?action=<?php echo $action; ?><?php echo $id ? '&id='.$id : ''; ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="existing_image_url" value="<?php echo $post['image_url'] ?? ''; ?>">
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Post Title</label>
                        <input type="text" name="title" value="<?php echo $post['title'] ?? ''; ?>" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Category</label>
                        <select name="category" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none">
                            <option value="Technical" <?php echo ($post['category'] ?? '') === 'Technical' ? 'selected' : ''; ?>>Technical</option>
                            <option value="Inspirational" <?php echo ($post['category'] ?? '') === 'Inspirational' ? 'selected' : ''; ?>>Inspirational</option>
                            <option value="Future Work" <?php echo ($post['category'] ?? '') === 'Future Work' ? 'selected' : ''; ?>>Future Work</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Short Professional Description</label>
                    <textarea name="description" rows="3" placeholder="A brief summary for the blog listing page..." class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none"><?php echo $post['description'] ?? ''; ?></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Full Content (HTML allowed)</label>
                    <textarea name="content" rows="10" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none"><?php echo $post['content'] ?? ''; ?></textarea>
                </div>
                
                <!-- Main Featured Image -->
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-4">Featured Image (Primary)</label>
                    
                    <?php if (!empty($post['image_url'])): ?>
                        <div class="mb-4">
                            <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="Current" class="h-32 rounded-lg object-cover border border-gray-200">
                        </div>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 mb-2 uppercase">Upload File</label>
                            <input type="file" name="image_file" accept="image/*" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 mb-2 uppercase">Or Image Link</label>
                            <input type="url" name="image_link" placeholder="https://..." class="w-full border text-sm border-gray-200 rounded-xl px-4 py-2 focus:ring-2 ring-blue-100 outline-none">
                        </div>
                    </div>
                </div>

                <!-- Gallery Images -->
                <div class="bg-white p-6 rounded-2xl border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <label class="block text-sm font-bold text-gray-700">Project Gallery (Additional Images)</label>
                        <button type="button" onclick="addGallerySlot()" class="text-xs font-bold text-blue-600 hover:underline">+ Add More</button>
                    </div>

                    <div id="gallery-container" class="space-y-4">
                        <?php if (!empty($gallery)): ?>
                            <?php foreach ($gallery as $img): ?>
                                <div class="flex gap-4 items-center bg-gray-50 p-4 rounded-xl relative">
                                    <img src="<?php echo htmlspecialchars($img['image_url']); ?>" class="w-16 h-16 object-cover rounded-lg">
                                    <input type="hidden" name="gallery_links[]" value="<?php echo $img['image_url']; ?>">
                                    <span class="text-xs text-gray-500 truncate flex-grow"><?php echo $img['image_url']; ?></span>
                                    <button type="button" onclick="this.parentElement.remove()" class="text-red-500 font-bold text-xs">&times;</button>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <script>
                    function addGallerySlot() {
                        const container = document.getElementById('gallery-container');
                        const div = document.createElement('div');
                        div.className = 'grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-4 rounded-xl relative group';
                        div.innerHTML = `
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 mb-1 uppercase">Upload</label>
                                <input type="file" name="gallery_files[]" accept="image/*" class="text-xs text-gray-500">
                            </div>
                            <div class="flex items-end gap-2">
                                <div class="flex-grow">
                                    <label class="block text-[10px] font-bold text-gray-400 mb-1 uppercase">Link</label>
                                    <input type="url" name="gallery_links[]" placeholder="https://..." class="w-full border text-xs border-gray-200 rounded-lg px-3 py-2 outline-none">
                                </div>
                                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-500 p-2 font-bold">&times;</button>
                            </div>
                        `;
                        container.appendChild(div);
                    }
                </script>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none">
                        <option value="draft" <?php echo ($post['status'] ?? '') === 'draft' ? 'selected' : ''; ?>>Draft</option>
                        <option value="published" <?php echo ($post['status'] ?? '') === 'published' ? 'selected' : ''; ?>>Published</option>
                    </select>
                </div>
                <div class="flex space-x-4 pt-4">
                    <button type="submit" name="save_post" class="bg-blue-600 text-white px-12 py-4 rounded-2xl font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-200">Save Intelligence</button>
                    <a href="manage_blog.php" class="bg-gray-100 text-gray-600 px-12 py-4 rounded-2xl font-bold hover:bg-gray-200 transition-all">Discard</a>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>
</div>

<?php include_once 'footer.php'; ?>
