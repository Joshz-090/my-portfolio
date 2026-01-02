<?php 
require_once 'config/db.php';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    if ($name && $email && $message) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $subject, $message]);
            $success = true;
        } catch (Exception $e) {
            $error = "Something went wrong. Please try again later.";
        }
    } else {
        $error = "Please fill in all required fields.";
    }
}

include_once 'src/partials/header.php'; 
?>

<div class="max-w-7xl mx-auto px-4 py-16 relative">
    <!-- Decorative background elements -->
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl -z-10 animate-pulse"></div>
    <div class="absolute bottom-20 left-0 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl -z-10"></div>

    <div class="grid lg:grid-cols-2 gap-16 items-start">
        <!-- Contact Info Column -->
        <div class="space-y-12">
            <header>
                <div class="inline-block px-4 py-1 mb-4 bg-primary/10 rounded-full">
                    <span class="text-xs font-bold text-primary uppercase tracking-widest">Get in Touch</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-black mb-6 tracking-tight">
                    Let's Build <span class="text-primary italic">Together</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 leading-relaxed max-w-xl font-medium">
                    Have a vision? A problem to solve? Or just want to talk shop? My inbox is always open for innovators and collaborators.
                </p>
            </header>
            
            <div class="space-y-8">
                <a href="mailto:eyasuzerihun80@gmail.com" class="group flex items-center gap-6 p-6 bg-white/40 dark:bg-gray-800/40 backdrop-blur-md rounded-3xl border border-white/20 dark:border-gray-700/30 transition-all hover:scale-102 hover:shadow-xl hover:shadow-primary/5">
                    <div class="w-14 h-14 bg-primary text-white rounded-2xl flex items-center justify-center text-xl shadow-lg shadow-primary/20">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-widest text-gray-400 mb-1">Email Me At</h3>
                        <p class="text-lg font-bold text-gray-800 dark:text-white">eyasuzerihun80@gmail.com</p>
                    </div>
                </a>

                <a href="https://github.com/joshz-090" class="group flex items-center gap-6 p-6 bg-white/40 dark:bg-gray-800/40 backdrop-blur-md rounded-3xl border border-white/20 dark:border-gray-700/30 transition-all hover:scale-102 hover:shadow-xl hover:shadow-primary/5">
                        <div class="w-14 h-14 bg-dark text-white rounded-2xl flex items-center justify-center text-xl shadow-lg dark:bg-gray-700">
                            <i class="fa-brands fa-github"></i>
                        </div>
                        <div>
                            <h3 class="text-xs font-black uppercase tracking-widest text-gray-400 mb-1">Follow on GitHub</h3>
                            <p class="text-lg font-bold text-gray-800 dark:text-white">@joshz-090</p>
                        </div>
                </a>   
            </div>

            <!-- Social Grid -->
            <div>
                <h3 class="text-sm font-black uppercase tracking-widest text-gray-400 mb-6">Digital Ecosystem</h3>
                <div class="grid grid-cols-4 gap-4">
                    <a href="https://www.linkedin.com/in/joshz-090/" class="w-full aspect-square bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-2xl flex items-center justify-center text-xl hover:scale-110 transition-transform duration-300">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="https://twitter.com/joshz_090" class="w-full aspect-square bg-sky-100 dark:bg-sky-900/30 text-sky-500 rounded-2xl flex items-center justify-center text-xl hover:scale-110 transition-transform duration-300">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/joshz_090/" class="w-full aspect-square bg-pink-100 dark:bg-pink-900/30 text-pink-600 rounded-2xl flex items-center justify-center text-xl hover:scale-110 transition-transform duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://t.me/joshz_090" class="w-full aspect-square bg-primary/20 dark:bg-primary/20 text-primary dark:text-primary rounded-2xl flex items-center justify-center text-xl hover:scale-110 transition-transform duration-300">
                        <i class="fa-brands fa-telegram"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Contact Form Column -->
        <div class="relative">
            <!-- Form Card -->
            <div class="bg-white/60 dark:bg-gray-900/60 backdrop-blur-2xl p-10 rounded-[3rem] border border-white/40 dark:border-gray-800/40 shadow-2xl relative z-10">
                <div class="mb-10">
                    <h2 class="text-2xl font-black mb-2">Drop a Message</h2>
                    <p class="text-gray-500 text-sm font-medium">I usually respond within 24 hours.</p>
                </div>

                <?php if ($success): ?>
                    <div class="bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 p-4 rounded-2xl mb-8 flex items-center gap-4 animate-fade-in">
                        <i class="fa-solid fa-circle-check text-xl"></i>
                        <p class="font-bold text-sm">Message sent! Talk to you soon.</p>
                    </div>
                <?php endif; ?>

                <?php if ($error): ?>
                    <div class="bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 p-4 rounded-2xl mb-8 flex items-center gap-4 animate-fade-in">
                        <i class="fa-solid fa-circle-exclamation text-xl"></i>
                        <p class="font-bold text-sm"><?php echo $error; ?></p>
                    </div>
                <?php endif; ?>

                <form action="contact.php" method="POST" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400 ml-1">Full Name</label>
                            <input type="text" name="name" placeholder="John Doe" required 
                                   class="w-full bg-gray-50 dark:bg-dark/50 border border-gray-200 dark:border-gray-700 rounded-2xl px-6 py-4 focus:ring-2 ring-primary/20 outline-none transition-all font-medium">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-black uppercase tracking-widest text-gray-400 ml-1">Email</label>
                            <input type="email" name="email" placeholder="john@example.com" required 
                                   class="w-full bg-gray-50 dark:bg-dark/50 border border-gray-200 dark:border-gray-700 rounded-2xl px-6 py-4 focus:ring-2 ring-primary/20 outline-none transition-all font-medium">
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-widest text-gray-400 ml-1">Subject</label>
                        <input type="text" name="subject" placeholder="Project Inquiry" 
                               class="w-full bg-gray-50 dark:bg-dark/50 border border-gray-200 dark:border-gray-700 rounded-2xl px-6 py-4 focus:ring-2 ring-primary/20 outline-none transition-all font-medium">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-widest text-gray-400 ml-1">Message</label>
                        <textarea name="message" placeholder="Tell me about your project..." required rows="4" 
                                  class="w-full bg-gray-50 dark:bg-dark/50 border border-gray-200 dark:border-gray-700 rounded-2xl px-6 py-4 focus:ring-2 ring-primary/20 outline-none transition-all font-medium"></textarea>
                    </div>

                    <button type="submit" class="group w-full bg-primary hover:bg-blue-600 text-white font-black py-5 rounded-2xl transition-all shadow-xl shadow-primary/20 flex items-center justify-center gap-3 active:scale-95">
                        <span>Ignite Discussion</span>
                        <i class="fa-solid fa-paper-plane group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </button>
                </form>
            </div>
            
            <!-- Shadow decoration -->
            <div class="absolute -bottom-6 -right-6 w-full h-full bg-primary/5 rounded-[3rem] -z-10"></div>
        </div>
    </div>
</div>

<?php include_once 'src/partials/footer.php'; ?>
