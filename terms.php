<?php 
require_once 'config/db.php';
include_once 'src/partials/header.php'; 
?>

<div class="max-w-4xl mx-auto px-4 py-24">
    <header class="text-center mb-16 animate-fade-in">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Terms of <span class="text-primary italic">Use</span></h1>
        <p class="text-gray-600 dark:text-gray-400">Last updated: <?php echo date('F d, Y'); ?></p>
    </header>

    <div class="glass p-8 md:p-12 rounded-[2.5rem] border border-gray-200 dark:border-gray-800 space-y-12 text-gray-700 dark:text-gray-300 leading-relaxed">
        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">01</span>
                Agreement to Terms
            </h2>
            <p>
                By accessing or using this website, you agree to be bound by these Terms of Use. If you do not agree with any part of these terms, you must not use this website.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">02</span>
                Intellectual Property
            </h2>
            <p>
                All content on this website, including but not limited to text, images, code, logos, and design elements, is my property and protected by international copyright laws unless otherwise stated. You may view and download content for personal, non-commercial use only.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">03</span>
                User Conduct
            </h2>
            <div class="space-y-4">
                <p>When using this website, you agree not to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Use the website for any unlawful purpose.</li>
                    <li>Attempt to interfere with the proper functioning of the site.</li>
                    <li>Post or transmit any harmful or offensive content through contact forms.</li>
                    <li>Scrape or extract data for commercial purposes without permission.</li>
                </ul>
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">04</span>
                No Warranties
            </h2>
            <p>
                This website is provided "as is" without any warranties, express or implied. I do not guarantee that the information on this site is always accurate, complete, or up-to-date.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">05</span>
                Limitation of Liability
            </h2>
            <p>
                I will not be liable for any damages arising out of or in connection with the use of this website. This includes, but is not limited to, direct, indirect, incidental, or consequential damages.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">06</span>
                External Links
            </h2>
            <p>
                This website may contain links to third-party websites. I am not responsible for the content or privacy practices of those external sites.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                <span class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-sm">07</span>
                Changes to Terms
            </h2>
            <p>
                I reserve the right to modify these Terms of Use at any time. Your continued use of the website after changes are posted constitutes your acceptance of the new terms.
            </p>
        </section>

        <div class="pt-8 border-t border-gray-100 dark:border-gray-800 text-center">
            <p class="text-sm">For any questions regarding these Terms of Use, please contact me through the contact page or email:</p>
            <a href="mailto:eyasuzerihun80@gmail.com" class="text-primary font-bold hover:underline">eyasuzerihun80@gmail.com</a>
            <p>or</p>
            <a href="contact.php" class="text-primary font-bold hover:underline">Contact Page</a>
        </div>
    </div>
</div>

<?php include_once 'src/partials/footer.php'; ?>
