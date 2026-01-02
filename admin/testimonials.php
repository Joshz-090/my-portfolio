<?php
require_once 'auth_check.php';
require_once '../config/db.php';

if (isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $stmt = $pdo->prepare("UPDATE testimonials SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);
}

if (isset($_POST['delete_testimonial'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM testimonials WHERE id = ?");
    $stmt->execute([$id]);
}

$testimonials = $pdo->query("SELECT * FROM testimonials ORDER BY created_at DESC")->fetchAll();

include_once 'header.php';
?>

<div class="p-8">
    <h1 class="text-2xl font-bold mb-8">Manage Testimonials</h1>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Image</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Content</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php foreach ($testimonials as $t): ?>
                    <tr>
                        <td class="px-6 py-4">
                            <?php if (!empty($t['image_url'])): ?>
                                <img src="<?php echo htmlspecialchars($t['image_url']); ?>" alt="User" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                            <?php else: ?>
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs">No Img</div>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-800"><?php echo htmlspecialchars($t['name']); ?></div>
                            <div class="text-[10px] text-gray-400"><?php echo htmlspecialchars($t['role']); ?></div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate"><?php echo htmlspecialchars($t['content']); ?></td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-[10px] uppercase font-bold rounded 
                                <?php echo $t['status'] === 'approved' ? 'bg-green-100 text-green-600' : ($t['status'] === 'pending' ? 'bg-yellow-100 text-yellow-600' : 'bg-red-100 text-red-600'); ?>">
                                <?php echo $t['status']; ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 flex space-x-2">
                            <form method="POST" class="inline">
                                <input type="hidden" name="id" value="<?php echo $t['id']; ?>">
                                <?php if ($t['status'] !== 'approved'): ?>
                                    <button type="submit" name="update_status" value="1" class="text-green-600 text-sm font-bold hover:underline">
                                        <input type="hidden" name="status" value="approved">Approve
                                    </button>
                                <?php else: ?>
                                    <button type="submit" name="update_status" value="1" class="text-gray-400 text-sm font-bold hover:underline">
                                        <input type="hidden" name="status" value="pending">Unapprove
                                    </button>
                                <?php endif; ?>
                            </form>
                            <form method="POST" class="inline" onsubmit="return confirm('Delete?');">
                                <input type="hidden" name="id" value="<?php echo $t['id']; ?>">
                                <button type="submit" name="delete_testimonial" class="text-red-500 text-sm font-bold hover:underline ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'footer.php'; ?>
