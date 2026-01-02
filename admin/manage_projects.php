<?php
require_once 'auth_check.php';
require_once '../config/db.php';
require_once '../src/helpers/CloudinaryUploader.php';

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save_project'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $tech_stack = $_POST['tech_stack'];
        $github_url = $_POST['github_url'];
        $live_url = $_POST['live_url'];
        $status = $_POST['status'];
        
        // Handle Image
        $image_url = $_POST['existing_image_url'] ?? ''; 
        
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedUrl = CloudinaryUploader::upload($_FILES['image_file']);
            if ($uploadedUrl) {
                $image_url = $uploadedUrl;
            }
        } elseif (!empty($_POST['image_link'])) {
            $image_url = $_POST['image_link'];
        }

        if ($id) {
            $stmt = $pdo->prepare("UPDATE projects SET title=?, description=?, tech_stack=?, image_url=?, github_url=?, live_url=?, status=? WHERE id=?");
            $stmt->execute([$title, $description, $tech_stack, $image_url, $github_url, $live_url, $status, $id]);
            $message = "Project updated successfully!";
        } else {
            $stmt = $pdo->prepare("INSERT INTO projects (title, description, tech_stack, image_url, github_url, live_url, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $description, $tech_stack, $image_url, $github_url, $live_url, $status]);
            $id = $pdo->lastInsertId();
            // Initialize stats
            $pdo->prepare("INSERT INTO project_stats (project_id) VALUES (?)")->execute([$id]);
            $message = "Project added successfully!";
        }
        $action = 'list';
    }

    if (isset($_POST['delete_project'])) {
        $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        $message = "Project deleted.";
        $action = 'list';
    }
}

$projects = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC")->fetchAll();

if ($action === 'edit' && $id) {
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    $project = $stmt->fetch();
}

include_once 'header.php';
?>

<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Manage Projects</h1>
        <?php if ($action === 'list'): ?>
            <a href="?action=add" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold text-sm hover:bg-blue-700 transition-all">+ Add New Project</a>
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
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Tech Stack</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php foreach ($projects as $pj): ?>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-800"><?php echo htmlspecialchars($pj['title']); ?></td>
                            <td class="px-6 py-4 text-sm text-gray-500"><?php echo htmlspecialchars($pj['tech_stack']); ?></td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-[10px] uppercase font-bold rounded <?php echo $pj['status'] === 'published' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600'; ?>">
                                    <?php echo $pj['status']; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 flex space-x-3">
                                <a href="?action=edit&id=<?php echo $pj['id']; ?>" class="text-blue-600 hover:underline text-sm font-medium">Edit</a>
                                <form method="POST" action="?action=delete&id=<?php echo $pj['id']; ?>" onsubmit="return confirm('Really delete?');">
                                    <button type="submit" name="delete_project" class="text-red-500 hover:underline text-sm font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <!-- Add/Edit Form -->
        <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm max-w-2xl">
            <form action="?action=<?php echo $action; ?><?php echo $id ? '&id='.$id : ''; ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="existing_image_url" value="<?php echo $project['image_url'] ?? ''; ?>">
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Project Title</label>
                    <input type="text" name="title" value="<?php echo $project['title'] ?? ''; ?>" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none"><?php echo $project['description'] ?? ''; ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tech Stack (comma separated)</label>
                    <input type="text" name="tech_stack" value="<?php echo $project['tech_stack'] ?? ''; ?>" placeholder="e.g. Django, Tailwind, MySQL" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">GitHub URL</label>
                        <input type="url" name="github_url" value="<?php echo $project['github_url'] ?? ''; ?>" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Live Demo URL</label>
                        <input type="url" name="live_url" value="<?php echo $project['live_url'] ?? ''; ?>" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none">
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-4">Project Image</label>
                    
                    <?php if (!empty($project['image_url'])): ?>
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-2">Current Image:</p>
                            <img src="<?php echo htmlspecialchars($project['image_url']); ?>" alt="Current" class="h-32 rounded-lg object-cover border border-gray-200">
                        </div>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-2 uppercase">Option 1: Upload File</label>
                            <input type="file" name="image_file" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-2 uppercase">Option 2: Image Link</label>
                            <input type="url" name="image_link" placeholder="https://example.com/image.jpg" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none">
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 ring-blue-100 outline-none">
                        <option value="draft" <?php echo ($project['status'] ?? '') === 'draft' ? 'selected' : ''; ?>>Draft</option>
                        <option value="published" <?php echo ($project['status'] ?? '') === 'published' ? 'selected' : ''; ?>>Published</option>
                    </select>
                </div>
                <div class="flex space-x-4">
                    <button type="submit" name="save_project" class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-700 transition-all focus:scale-95">Save Project</button>
                    <a href="manage_projects.php" class="bg-gray-100 text-gray-600 px-8 py-3 rounded-xl font-bold hover:bg-gray-200 transition-all">Cancel</a>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>

<?php include_once 'footer.php'; ?>
