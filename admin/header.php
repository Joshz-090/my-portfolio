<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Eyasu Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex">
    <!-- Sidebar -->
    <aside class="w-64 min-h-screen bg-white border-r border-gray-100 flex flex-col pt-8">
        <div class="px-6 mb-10">
            <span class="text-xl font-bold text-blue-600">AdminPanel</span>
        </div>
        <nav class="flex-grow space-y-1 px-4">
            <a href="dashboard.php" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50 group">
                <span class="mr-3">📊</span> Dashboard
            </a>
            <a href="manage_projects.php" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50">
                <span class="mr-3">🚀</span> Projects
            </a>
            <a href="manage_blog.php" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50">
                <span class="mr-3">✍️</span> Blog Posts
            </a>
            <a href="testimonials.php" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50">
                <span class="mr-3">💬</span> Testimonials
            </a>
            <a href="messages.php" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-50">
                <span class="mr-3">📧</span> Messages
            </a>
        </nav>
        <div class="p-4 border-t border-gray-100">
            <div class="px-4 py-3 flex items-center mb-4">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-3 text-xs">
                    EZ
                </div>
                <div>
                    <div class="text-xs font-bold"><?php echo $_SESSION['admin_name']; ?></div>
                    <div class="text-[10px] text-gray-400">Online</div>
                </div>
            </div>
            <a href="logout.php" class="block w-full text-left px-4 py-2 text-xs font-bold text-red-500 hover:bg-red-50 rounded-lg">
                Logout
            </a>
        </div>
    </aside>
    <main class="flex-grow">
        <!-- Top Nav -->
        <header class="h-16 bg-white border-b border-gray-100 flex items-center justify-between px-8">
            <div class="text-sm text-gray-500">Welcome back, Eyasu!</div>
            <div class="flex items-center space-x-4">
                <a href="../index.php" target="_blank" class="text-xs font-bold text-blue-600 hover:underline">View Live Site</a>
            </div>
        </header>
