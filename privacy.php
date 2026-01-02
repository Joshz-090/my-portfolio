<?php 
require_once 'config/db.php';
include_once 'src/partials/header.php'; 
?>

<div class="max-w-4xl mx-auto px-4 py-24">
    <header class="text-center mb-16 animate-fade-in">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Privacy <span class="text-primary italic">Policy</span></h1>
        <p class="text-gray-600 dark:text-gray-400">Last updated: <?php echo date('F d, Y'); ?></p>
    </header>

    <div class="glass p-8 md:p-12 rounded-[2.5rem] border border-gray-200 dark:border-gray-800 space-y-12 text-gray-700 dark:text-gray-300 leading-relaxed">
        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">01</span>
                Introduction
            </h2>
            <p>
                Welcome to my portfolio website. I value your privacy and am committed to protecting any personal data you shared with me. This Privacy Policy explains how I collect, use, and safeguard your information when you visit my site.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">02</span>
                Information I Collect
            </h2>
            <div class="space-y-4">
                <p>I may collect information in the following ways:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li><strong>Contact Form:</strong> When you send me a message through the contact form, I collect your name, email address, and the content of your message.</li>
                    <li><strong>Usage Data:</strong> Like most websites, I may automatically collect certain information such as your IP address, browser type, and pages visited to help improve the site experience.</li>
                    <li><strong>Cookies:</strong> This site may use cookies to remember your preferences (such as dark mode) and for basic analytics.</li>
                </ul>
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">03</span>
                How I Use Your Information
            </h2>
            <p>
                The information collected is used solely to respond to your inquiries, improve the website functionality, and analyze site traffic. I do not sell, trade, or otherwise transfer your information to third parties.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">04</span>
                Data Security
            </h2>
            <p>
                I implement reasonable security measures to protect your information. However, please be aware that no method of transmission over the internet is 100% secure.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">05</span>
                Your Rights
            </h2>
            <p>
                You have the right to request access to the personal data I hold about you, to request corrections, or to ask for your data to be deleted. To exercise these rights, please contact me through the contact page.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">06</span>
                Updates
            </h2>
            <p>
                I may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated "Last updated" date.
            </p>
        </section>

        <div class="pt-8 border-t border-gray-100 dark:border-gray-800 text-center">
            <p class="text-sm">If you have any questions about this Privacy Policy, please contact me at:</p>
            <a href="mailto:eyasuzerihun80@gmail.com" class="text-primary font-bold hover:underline">eyasuzerihun80@gmail.com</a>
            <p>or</p>
            <a href="contact.php" class="text-primary font-bold hover:underline">Contact Page</a>
        </div>
    </div>
</div>

<?php include_once 'src/partials/footer.php'; ?>
