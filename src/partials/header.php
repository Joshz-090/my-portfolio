<?php
$current_page = basename($_SERVER['PHP_SELF']);
$nav_links = [
    'Home' => 'index.php',
    'about' => 'about.php',
    'Projects' => 'projects.php',
    'Blog' => 'blog.php',
    'Contact' => 'contact.php',
];
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eyasu Zerihun (joshz-090) | Software Engineer & Full-Stack Developer</title>
    <!-- SEO Meta Tags -->
    <meta name="description" content="Official portfolio of Eyasu Zerihun (joshz-090). Software Engineering student and Full-Stack Developer specializing in Python, PHP, and AI.">
    <meta name="keywords" content="Eyasu Zerihun, joshz-090, Software Engineer, Full-Stack Developer, Portfolio, Python, PHP, AI">
    <meta name="author" content="Eyasu Zerihun">

    <!-- JSON-LD Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Eyasu Zerihun",
      "alternateName": "joshz-090",
      "url": "https://joshz-090.online",
      "image": "https://joshz-090.online/assets/images/profile.png",
      "sameAs": [
        "https://github.com/joshz-090",
        "https://www.linkedin.com/in/joshz-090/",
        "https://twitter.com/joshz_090",
        "https://t.me/joshz_090"
      ],
      "jobTitle": "Software Engineering Student & Full-Stack Developer",
      "description": "Software Engineering student specializing in building robust back-end systems using Python (Flask & Django) and exploring AI."
    }
    </script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> 
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        dark: '#0f172a',
                    },
                    animation: {
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        glow: {
                            '0%': { boxShadow: '0 0 5px rgba(59, 130, 246, 0.5)' },
                            '100%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.8), 0 0 10px rgba(59, 130, 246, 0.6)' },
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="src/partials/global.css?v=2">
    <link rel="stylesheet" href="src/partials/terminal.css?v=2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="js/terminal.js?v=2" defer></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Header Blending Styles */
        nav {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .header-transparent {
            background-color: transparent !important;
            border-bottom-color: transparent !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
        }

        .header-scrolled {
            background-color: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
        }

        .dark .header-scrolled {
            background-color: rgba(15, 23, 42, 0.8) !important;
        }

        /* Force white text on hero */
        .header-on-hero .nav-link:not(.active) {
            color: rgba(255, 255, 255, 0.8) !important;
        }
        .header-on-hero .nav-link:not(.active):hover {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.1) !important;
        }
        .header-on-hero #logo-text {
            color: #ffffff !important;
        }
        .header-on-hero #open-terminal-btn, 
        .header-on-hero #mobile-menu-btn {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        /* Custom smooth transition for nav pill */
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: #3b82f6;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after {
            width: 80%;
        }
        .nav-link.active::after {
            width: 0; /* No underline for active pill */
        }

        /* Logo Animations */
        @keyframes logo-bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes logo-rotate-3d {
            0% { transform: rotateY(0deg); }
            100% { transform: rotateY(360deg); }
        }

        .animate-logo-bounce {
            animation: logo-bounce 2s ease-in-out infinite;
        }

        .animate-logo-rotate {
            animation: logo-rotate-3d 1s ease-in-out forwards;
        }

        /* Mobile Menu */
        #mobile-menu {
            transition: all 0.3s ease-in-out;
            max-height: 0;
            overflow: hidden;
        }
        #mobile-menu.open {
            max-height: 500px;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-dark text-gray-900 dark:text-gray-100 transition-colors duration-300">
    
    <?php include_once 'src/partials/terminal.php'; ?>

    <nav class="fixed w-full z-50 border-b border-gray-200 dark:border-gray-800 py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- logo -->
                <div class="flex-shrink-0">
                    <div id="logo-container" class="inline-block cursor-pointer">
                        <span id="logo-text" class="text-3xl font-black text-primary animate-logo-bounce inline-block" style="perspective: 1000px;">
                            <span class="sm:hidden">JE</span>
                            <span class="hidden sm:inline">Joshz-090</span>
                        </span>
                    </div>
                </div>

                <!-- navigation links -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-2">
                        <?php foreach ($nav_links as $name => $link): ?>
                            <?php 
                                $isActive = ($current_page === $link) || ($link === 'blog.php' && strpos($current_page, 'blog') !== false) || ($link === 'projects.php' && strpos($current_page, 'project') !== false); 
                                // Specific active cases for sub-pages if any, simplified generic check above
                            ?>
                            <a href="<?php echo $link; ?>" 
                               class="nav-link px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 
                               <?php echo $isActive 
                                   ? 'bg-primary text-white shadow-lg shadow-blue-500/30 active' 
                                   : 'text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-white hover:bg-gray-100/50 dark:hover:bg-gray-800/50'; 
                               ?>">
                                <?php echo $name; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-6">
                    <!-- Terminal Trigger -->
                    <button id="open-terminal-btn" class="p-2 rounded-lg text-gray-500 hover:text-primary hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800 transition-all" title="Open Terminal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="4 17 10 11 4 5"></polyline>
                            <line x1="12" y1="19" x2="20" y2="19"></line>
                        </svg>
                    </button>

                    <!-- Dark Mode Toggle -->
                    <label class="theme-switch">
                      <input class="theme-switch__checkbox" type="checkbox" id="theme-toggle" />
                      <div class="theme-switch__container">
                        <div class="theme-switch__clouds"></div>
                        <div class="theme-switch__stars-container">
                          <svg fill="none" viewBox="0 0 144 55" xmlns="http://www.w3.org/2000/svg">
                            <path
                              fill="currentColor"
                              d="M135.831 3.00688C135.055 3.85027 134.111 4.29946 133 4.35447C134.111 4.40947 135.055 4.85867 135.831 5.71123C136.607 6.55462 136.996 7.56303 136.996 8.72727C136.996 7.95722 137.172 7.25134 137.525 6.59129C137.886 5.93124 138.372 5.39954 138.98 5.00535C139.598 4.60199 140.268 4.39114 141 4.35447C139.88 4.2903 138.936 3.85027 138.16 3.00688C137.384 2.16348 136.996 1.16425 136.996 0C136.996 1.16425 136.607 2.16348 135.831 3.00688ZM31 23.3545C32.1114 23.2995 33.0551 22.8503 33.8313 22.0069C34.6075 21.1635 34.9956 20.1642 34.9956 19C34.9956 20.1642 35.3837 21.1635 36.1599 22.0069C36.9361 22.8503 37.8798 23.2903 39 23.3545C38.2679 23.3911 37.5976 23.602 36.9802 24.0053C36.3716 24.3995 35.8864 24.9312 35.5248 25.5913C35.172 26.2513 34.9956 26.9572 34.9956 27.7273C34.9956 26.563 34.6075 25.5546 33.8313 24.7112C33.0551 23.8587 32.1114 23.4095 31 23.3545ZM0 36.3545C1.11136 36.2995 2.05513 35.8503 2.83131 35.0069C3.6075 34.1635 3.99559 33.1642 3.99559 32C3.99559 33.1642 4.38368 34.1635 5.15987 35.0069C5.93605 35.8503 6.87982 36.2903 8 36.3545C7.26792 36.3911 6.59757 36.602 5.98015 37.0053C5.37155 37.3995 4.88644 37.9312 4.52481 38.5913C4.172 39.2513 3.99559 39.9572 3.99559 40.7273C3.99559 39.563 3.6075 38.5546 2.83131 37.7112C2.05513 36.8587 1.11136 36.4095 0 36.3545ZM56.8313 24.0069C56.0551 24.8503 55.1114 25.2995 54 25.3545C55.1114 25.4095 56.0551 25.8587 56.8313 26.7112C57.6075 27.5546 57.9956 28.563 57.9956 29.7273C57.9956 28.9572 58.172 28.2513 58.5248 27.5913C58.8864 26.9312 59.3716 26.3995 59.9802 26.0053C60.5976 25.602 61.2679 25.3911 62 25.3545C60.8798 25.2903 59.9361 24.8503 59.1599 24.0069C58.3837 23.1635 57.9956 22.1642 57.9956 21C57.9956 22.1642 57.6075 23.1635 56.8313 24.0069ZM81 25.3545C82.1114 25.2995 83.0551 24.8503 83.8313 24.0069C84.6075 23.1635 84.9956 22.1642 84.9956 21C84.9956 22.1642 85.3837 23.1635 86.1599 24.0069C86.9361 24.8503 87.8798 25.2903 89 25.3545C88.2679 25.3911 87.5976 25.602 86.9802 26.0053C86.3716 26.3995 85.8864 26.9312 85.5248 27.5913C85.172 28.2513 84.9956 28.9572 84.9956 29.7273C84.9956 28.563 84.6075 27.5546 83.8313 26.7112C83.0551 25.8587 82.1114 25.4095 81 25.3545ZM136 36.3545C137.111 36.2995 138.055 35.8503 138.831 35.0069C139.607 34.1635 139.996 33.1642 139.996 32C139.996 33.1642 140.384 34.1635 141.16 35.0069C141.936 35.8503 142.88 36.2903 144 36.3545C143.268 36.3911 142.598 36.602 141.98 37.0053C141.372 37.3995 140.886 37.9312 140.525 38.5913C140.172 39.2513 139.996 39.9572 139.996 40.7273C139.996 39.563 139.607 38.5546 138.831 37.7112C138.055 36.8587 137.111 36.4095 136 36.3545ZM101.831 49.0069C101.055 49.8503 100.111 50.2995 99 50.3545C100.111 50.4095 101.055 50.8587 101.831 51.7112C102.607 52.5546 102.996 53.563 102.996 54.7273C102.996 53.9572 103.172 53.2513 103.525 52.5913C103.886 51.9312 104.372 51.3995 104.98 51.0053C105.598 50.602 106.268 50.3911 107 50.3545C105.88 50.2903 104.936 49.8503 104.16 49.0069C103.384 48.1635 102.996 47.1642 102.996 46C102.996 47.1642 102.607 48.1635 101.831 49.0069Z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </div>
                        <div class="theme-switch__circle-container">
                          <div class="theme-switch__sun-moon-container">
                            <div class="theme-switch__moon">
                              <div class="theme-switch__spot"></div>
                              <div class="theme-switch__spot"></div>
                              <div class="theme-switch__spot"></div>
                            </div>
                          </div>
                        </div>
                        <div class="theme-switch__shooting-star"></div>
                        <div class="theme-switch__shooting-star-2"></div>
                        <div class="theme-switch__meteor"></div>
                        <div class="theme-switch__stars-cluster">
                          <div class="star"></div>
                          <div class="star"></div>
                          <div class="star"></div>
                          <div class="star"></div>
                          <div class="star"></div>
                        </div>
                        <div class="theme-switch__aurora"></div>
                        <div class="theme-switch__comets">
                          <div class="comet"></div>
                          <div class="comet"></div>
                        </div>
                      </div>
                    </label>
                    
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-500 hover:text-primary hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800 transition-all">
                        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Container -->
        <div id="mobile-menu" class="md:hidden bg-white/95 dark:bg-dark/95 backdrop-blur-md border-t border-gray-100 dark:border-gray-800">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <?php foreach ($nav_links as $name => $link): ?>
                    <?php 
                        $isActive = ($current_page === $link) || ($link === 'blog.php' && strpos($current_page, 'blog') !== false) || ($link === 'projects.php' && strpos($current_page, 'project') !== false); 
                    ?>
                    <a href="<?php echo $link; ?>" 
                       class="block px-4 py-3 rounded-xl text-base font-medium transition-all duration-300 
                       <?php echo $isActive 
                           ? 'bg-primary text-white shadow-lg' 
                           : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800'; 
                       ?>">
                        <?php echo $name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>

    <script>
        // Logo 3D Rotation Logic
        const logoText = document.getElementById('logo-text');
        if (logoText) {
            setInterval(() => {
                logoText.classList.add('animate-logo-rotate');
                setTimeout(() => {
                    logoText.classList.remove('animate-logo-rotate');
                }, 5000);
            }, 10000 + 5000); // 15s pause + 1s animation duration
        }

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('open');
                // Change icon if needed
            });
        }
    </script>

    <main class="<?php echo ($current_page === 'index.php' || $current_page === '') ? '' : 'pt-20'; ?>">
