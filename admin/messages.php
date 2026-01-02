<?php
require_once 'auth_check.php';
require_once '../config/db.php';

$message_info = '';
$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_message'])) {
    $stmt = $pdo->prepare("DELETE FROM contact_messages WHERE id = ?");
    $stmt->execute([$id]);
    $message_info = "Message deleted successfully.";
}

$messages = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC")->fetchAll();

include_once 'header.php';
?>

<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold">Contact Messages</h1>
    </div>

    <?php if ($message_info): ?>
        <div class="bg-green-50 text-green-600 p-4 rounded-xl mb-6 text-sm font-medium border border-green-100"><?php echo $message_info; ?></div>
    <?php endif; ?>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Sender</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Subject</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Message</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php foreach ($messages as $msg): ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-800"><?php echo htmlspecialchars($msg['name']); ?></div>
                            <div class="text-[10px] text-gray-400"><?php echo htmlspecialchars($msg['email']); ?></div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?php echo htmlspecialchars($msg['subject'] ?? 'No Subject'); ?></td>
                        <td class="px-6 py-4 text-sm text-gray-500 max-w-md">
                            <p class="truncate" title="<?php echo htmlspecialchars($msg['message']); ?>">
                                <?php echo htmlspecialchars($msg['message']); ?>
                            </p>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-400">
                            <?php echo date('M d, Y H:i', strtotime($msg['created_at'])); ?>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="?id=<?php echo $msg['id']; ?>" onsubmit="return confirm('Delete this message?');">
                                <button type="submit" name="delete_message" class="text-red-500 hover:underline text-sm font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($messages)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-400 text-sm">No messages found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'footer.php'; ?>
