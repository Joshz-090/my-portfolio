<?php 
require_once 'config/db.php';

// Fetch Featured Testimonials
$testimonialsSql = "SELECT * FROM testimonials WHERE status = 'approved' ORDER BY RAND() LIMIT 3";
$testimonials = $pdo->query($testimonialsSql)->fetchAll();

include_once 'src/partials/header.php'; 
?>

<!-- Cinematic Hero Section -->
<link rel="stylesheet" href="src/partials/hero.css">
<section id="cinematic-hero">
    <div id="starfield"></div>
    
    <div class="earth-container">
        <img src="assets/images/cn.png" alt="Earth" class="earth-img">
    </div>

    <div class="container relative z-10 px-4">
        <div class="flex justify-center w-full mt-28">
            <p align="center" class="w-full">
                <img class="w-full" src="https://readme-typing-svg.herokuapp.com/?font=Fira+Code&weight=900&size=42&pause=1200&color=FFFFFF&center=true&vCenter=true&width=1200&lines=👋+Hi,+I'm+Joshz-090+(Eyasu+Zerihun);Full-Stack+Developer;Software+Engineering+Student" alt="Typing SVG" />
            </p>
        </div>
        <div class="hero-content mx-auto mt-12">
            <!-- Main Heading -->
            <h1 class="hero-title">
                Building the <br> <span class="text-blue-500">Digital Future</span>
            </h1>

            <!-- Hero Description -->
            <p class="hero-subtitle">
                Software Engineering student & Full-Stack Developer specializing in architecting robust systems and exploring the intersection of AI and Scalability.
            </p>

            <!-- Buttons -->
            <div class="flex flex-wrap justify-center gap-6 mt-8">
                <a href="projects.php"
                   class="inline-flex items-center px-8 py-4 bg-white text-black rounded-full font-bold transition-all duration-300 hover:scale-105 hover:bg-blue-500 hover:text-white">
                    Explore My Projects
                </a>

                <a href="contact.php"
                   class="inline-flex items-center px-8 py-4 border-2 border-white/20 text-white rounded-full font-bold transition-all duration-300 hover:scale-105 hover:border-blue-500 hover:bg-blue-500/10">
                    Let’s Connect
                </a>
            </div>
        </div>
    </div>
</section>
<script src="js/hero.js"></script>

<!-- About Section -->
<section id="about" class="py-24 relative">
    <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-white to-transparent dark:from-gray-900 z-0"></div>
    <div class="container max-w-7xl mx-auto px-4 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left Column - About Text -->
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 mb-2">
                    <div class="w-12 h-1 bg-gradient-to-r from-primary to-blue-500 rounded-full"></div>
                    <span class="text-sm font-medium text-primary uppercase tracking-wider">About Me</span>
                </div>
                
                <h2 class="text-4xl md:text-5xl font-bold">
                    Crafting Digital <span class="text-primary">Solutions</span> with Code
                </h2>
                
                <div class="space-y-4 text-gray-600 dark:text-gray-300">
                    <p class="text-lg leading-relaxed">
                        I'm a passionate 3rd-year Software Engineering student specializing in building robust back-end systems using 
                        <span class="font-semibold text-primary">Python (Flask & Django)</span>. Currently exploring the fascinating realms of 
                        <span class="font-semibold text-purple-600">Artificial Intelligence</span> and multi-language programming paradigms.
                    </p>
                    <p class="text-lg leading-relaxed">
                        My development philosophy revolves around <span class="font-semibold">clean architecture</span>, 
                        <span class="font-semibold">scalable solutions</span>, and <span class="font-semibold">continuous learning</span> 
                        - always staying ahead of the curve in this rapidly evolving tech landscape.
                    </p>
                    <div class="flex flex-wrap gap-4 mt-8">
                        <div class="px-3 py-1.5 bg-red-500/10 border border-red-500/20 rounded-xl flex items-center gap-2">
                            <i class="fas fa-university text-red-600 text-xs"></i>
                            <span class="text-xs font-bold text-gray-700 dark:text-gray-300">CS50 CS</span>
                        </div>
                        <div class="px-3 py-1.5 bg-blue-500/10 border border-blue-500/20 rounded-xl flex items-center gap-2">
                            <i class="fab fa-python text-blue-600 text-xs"></i>
                            <span class="text-xs font-bold text-gray-700 dark:text-gray-300">CS50 Python</span>
                        </div>
                        <div class="px-3 py-1.5 bg-purple-500/10 border border-purple-500/20 rounded-xl flex items-center gap-2">
                            <i class="fas fa-brain text-purple-600 text-xs"></i>
                            <span class="text-xs font-bold text-gray-700 dark:text-gray-300">Udacity AI</span>
                        </div>
                        <div class="px-3 py-1.5 bg-teal-500/10 border border-teal-500/20 rounded-xl flex items-center gap-2">
                            <i class="fas fa-chart-line text-teal-600 text-xs"></i>
                            <span class="text-xs font-bold text-gray-700 dark:text-gray-300">Udacity Data</span>
                        </div>
                    </div>
                </div>
                
                <div class="pt-6">
                    <a href="about.php" class="group inline-flex items-center text-primary font-semibold text-lg hover:underline">
                        Discover My Journey
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Right Column - Stats Grid -->
            <div class="grid grid-cols-2 gap-6 relative">
                <!-- Floating Tech Icons -->
                <div class="absolute -top-6 -right-6 flex space-x-4 text-2xl opacity-70 z-10">
                    <i class="fab fa-python text-blue-500 floating" style="animation-delay: 0s;"></i>
                    <i class="fab fa-js-square text-yellow-500 floating" style="animation-delay: 0.5s;"></i>
                    <i class="fab fa-php text-purple-500 floating" style="animation-delay: 1s;"></i>
                </div>
                
                <!-- Stat Card 1 -->
                <div class="stat-card group relative p-8 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl border border-gray-700 glow-hover overflow-hidden">
                    <div class="absolute -top-6 -right-6 w-20 h-20 bg-gradient-to-br from-primary/20 to-primary/5 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-graduation-cap text-3xl text-primary floating-slow"></i>
                    </div>
                    <div class="relative z-10">
                        <span class="block text-5xl font-bold text-primary mb-2">3<sup class="text-lg">rd</sup></span>
                        <span class="text-lg font-medium text-gray-300">Year Student</span>
                        <div class="mt-6 pt-4 border-t border-gray-700">
                            <span class="text-sm text-gray-400">Software Engineering</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary to-transparent group-hover:h-2 transition-all duration-300"></div>
                </div>
 
                <!-- Stat Card 2 -->
                <div class="stat-card group relative p-8 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl border border-gray-700 glow-hover overflow-hidden">
                    <div class="absolute -top-6 -right-6 w-20 h-20 bg-gradient-to-br from-green-500/20 to-green-500/5 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-rocket text-3xl text-green-500 floating-slow" style="animation-delay: 0.3s;"></i>
                    </div>
                    <div class="relative z-10">
                        <span class="block text-5xl font-bold text-green-500 mb-2">10<sup class="text-lg">+</sup></span>
                        <span class="text-lg font-medium text-gray-300">Projects Completed</span>
                        <div class="mt-6 pt-4 border-t border-gray-700">
                            <span class="text-sm text-gray-400">And counting</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-green-500 to-transparent group-hover:h-2 transition-all duration-300"></div>
                </div>
                
                <!-- Stat Card 3 -->
                <div class="stat-card group relative p-8 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl border border-gray-700 glow-hover overflow-hidden">
                    <div class="absolute -top-6 -right-6 w-20 h-20 bg-gradient-to-br from-yellow-500/20 to-yellow-500/5 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-globe text-3xl text-yellow-500 floating-slow" style="animation-delay: 0.6s;"></i>
                    </div>
                    <div class="relative z-10">
                        <span class="block text-5xl font-bold text-yellow-500 mb-2">4<sup class="text-lg">+</sup></span>
                        <span class="text-lg font-medium text-gray-300">Languages</span>
                        <div class="mt-6 pt-4 border-t border-gray-700">
                            <span class="text-sm text-gray-400">Python, PHP, JavaScript, SQL</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-yellow-500 to-transparent group-hover:h-2 transition-all duration-300"></div>
                </div>
                
                <!-- Stat Card 4 -->
                <div class="stat-card group relative p-8 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl border border-gray-700 glow-hover overflow-hidden">
                    <div class="absolute -top-6 -right-6 w-20 h-20 bg-gradient-to-br from-purple-500/20 to-purple-500/5 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-robot text-3xl text-purple-500 floating-slow" style="animation-delay: 0.9s;"></i>
                    </div>
                    <div class="relative z-10">
                        <span class="block text-5xl font-bold text-purple-500 mb-2">AI</span>
                        <span class="text-lg font-medium text-gray-300">Enthusiast</span>
                        <div class="mt-6 pt-4 border-t border-gray-700">
                            <span class="text-sm text-gray-400">Machine Learning Focus</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-500 to-transparent group-hover:h-2 transition-all duration-300"></div>
                </div>
                
                <!-- Additional floating element -->
                <div class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 flex space-x-4 text-xl opacity-50">
                    <i class="fas fa-code text-blue-400 floating"></i>
                    <i class="fas fa-server text-green-400 floating" style="animation-delay: 0.2s;"></i>
                    <i class="fas fa-brain text-purple-400 floating" style="animation-delay: 0.4s;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-24 relative overflow-hidden bg-white dark:bg-gray-950 transition-colors duration-500">
    <div class="container max-w-7xl mx-auto px-4">
        <div class="text-center mb-20">
            <div class="inline-block mb-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-1 bg-primary rounded-full pulse-glow"></div>
                    <span class="text-xs font-black text-primary uppercase tracking-[0.4em]">Expertise</span>
                    <div class="w-12 h-1 bg-primary rounded-full pulse-glow"></div>
                </div>
            </div>
            <h2 class="text-4xl md:text-6xl font-black mb-6 tracking-tight text-gray-900 dark:text-white">
                Technologies I <span class="gradient-text">Master</span>
            </h2>
            <p class="text-xl text-gray-500 dark:text-gray-400 max-w-2xl mx-auto font-medium">
                Building robust solutions with modern technologies and industrial frameworks
            </p>
        </div>
        
        <!-- Skills Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
            <!-- Skill Item 1 -->
            <div class="group p-10 bg-gray-50/50 dark:bg-gray-800/30 backdrop-blur-sm rounded-[2.5rem] border border-gray-200/50 dark:border-gray-700/50 glow-hover shadow-sm">
                <div class="w-16 h-16 mb-8 rounded-2xl bg-blue-500/10 flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-transform">
                    <i class="fab fa-python text-4xl text-blue-500"></i>
                </div>
                <h3 class="text-2xl font-black mb-4 dark:text-white">Backend Engineering</h3>
                <p class="text-gray-600 dark:text-gray-400 text-lg leading-relaxed mb-8">
                    Building scalable server-side systems with specialized Python and PHP frameworks.
                </p>
                <div class="skill-bar-bg">
                    <div class="skill-bar-fill bg-blue-500" data-progress="90%" style="width: 0%"></div>
                </div>
                <div class="flex justify-between mt-3 text-xs font-black uppercase tracking-widest text-primary">
                    <span>Proficiency</span>
                    <span>80%</span>
                </div>
            </div>
            
            <!-- Skill Item 2 -->
            <div class="group p-10 bg-gray-50/50 dark:bg-gray-800/30 backdrop-blur-sm rounded-[2.5rem] border border-gray-200/50 dark:border-gray-700/50 glow-hover shadow-sm">
                <div class="w-16 h-16 mb-8 rounded-2xl bg-yellow-500/10 flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-transform">
                    <i class="fab fa-js text-4xl text-yellow-500"></i>
                </div>
                <h3 class="text-2xl font-black mb-4 dark:text-white">Web Ecosystems</h3>
                <p class="text-gray-600 dark:text-gray-400 text-lg leading-relaxed mb-8">
                    Developing interactive frontends and modern full-stack JavaScript applications.
                </p>
                <div class="skill-bar-bg">
                    <div class="skill-bar-fill bg-yellow-500" data-progress="80%" style="width: 0%"></div>
                </div>
                <div class="flex justify-between mt-3 text-xs font-black uppercase tracking-widest text-yellow-600">
                    <span>Proficiency</span>
                    <span>70%</span>
                </div>
            </div>
            
            <!-- Skill Item 3 -->
            <div class="group p-10 bg-gray-50/50 dark:bg-gray-800/30 backdrop-blur-sm rounded-[2.5rem] border border-gray-200/50 dark:border-gray-700/50 glow-hover shadow-sm">
                <div class="w-16 h-16 mb-8 rounded-2xl bg-purple-500/10 flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-transform">
                    <i class="fas fa-brain text-4xl text-purple-500"></i>
                </div>
                <h3 class="text-2xl font-black mb-4 dark:text-white">AI & Machine Learning</h3>
                <p class="text-gray-600 dark:text-gray-400 text-lg leading-relaxed mb-8">
                    Exploring intelligent systems and data-driven predictive solutions for complex problems.
                </p>
                <div class="skill-bar-bg">
                    <div class="skill-bar-fill bg-purple-500" data-progress="75%" style="width: 0%"></div>
                </div>
                <div class="flex justify-between mt-3 text-xs font-black uppercase tracking-widest text-purple-500">
                    <span>Proficiency</span>
                    <span>55%</span>
                </div>
            </div>
        </div>
        
        <!-- Professional Toolbox -->
        <div class="mt-20">
            <h3 class="text-3xl font-black text-center mb-12 dark:text-white">Professional <span class="text-primary italic">Toolbox</span></h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Python -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-blue-500/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-green-500/10 text-green-600 text-[10px] font-black rounded-full border border-green-500/20">3+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-blue-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <i class="fab fa-python text-blue-500 drop-shadow-[0_0_8px_rgba(59,130,246,0.5)]"></i>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">Python</span>
                </div>

                <!-- Django -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-green-600/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-sky-500/10 text-sky-600 text-[10px] font-black rounded-full border border-sky-500/20">6+ mths</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-sky-500/5 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <svg class="w-10 h-10 text-[#092e20] dark:text-white drop-shadow-[0_0_8px_rgba(9,46,32,0.5)]" viewBox="0 0 24 24" fill="currentColor"><path d="M11.146 0h3.924v18.166c-2.013.382-3.491.535-5.096.535-4.791 0-7.288-2.166-7.288-6.32 0-4.002 2.65-6.6 6.753-6.6.637 0 1.121.05 1.707.203zm0 9.143a3.894 3.894 0 00-1.325-.204c-1.988 0-3.134 1.223-3.134 3.365 0 2.09 1.096 3.236 3.109 3.236.433 0 .79-.025 1.35-.102V9.142zM21.314 6.06v9.098c0 3.134-.229 4.638-.917 5.937-.637 1.249-1.478 2.039-3.211 2.905l-3.644-1.733c1.733-.815 2.574-1.53 3.109-2.625.561-1.121.739-2.421.739-5.835V6.059h3.924zM17.39.021h3.924v4.026H17.39z"/></svg>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">Django</span>
                </div>

                <!-- PHP -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-blue-600/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-blue-500/10 text-blue-600 text-[10px] font-black rounded-full border border-blue-500/20">1+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-blue-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <i class="fa-brands fa-php text-blue-600 drop-shadow-[0_0_8px_rgba(37,99,235,0.5)]"></i>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">PHP</span>
                </div>

                <!-- React.js -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-cyan-400/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-cyan-500/10 text-cyan-600 text-[10px] font-black rounded-full border border-cyan-500/20">2+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-cyan-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <i class="fa-brands fa-react text-cyan-500 animate-spin-slow drop-shadow-[0_0_8px_rgba(34,211,238,0.5)]"></i>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">React.js</span>
                </div>

                <!-- Node.js -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-green-500/10 text-green-600 text-[10px] font-black rounded-full border border-green-500/20">2+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-green-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-120 group-hover:rotate-12 transition-all duration-500">
                        <i class="fa-brands fa-node-js text-green-600"></i>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">Node.js</span>
                </div>

                <!-- JS -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-yellow-500/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-yellow-500/10 text-yellow-600 text-[10px] font-black rounded-full border border-yellow-500/20">3+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-yellow-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <i class="fa-brands fa-js text-yellow-500 drop-shadow-[0_0_8px_rgba(234,179,8,0.5)]"></i>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">JS</span>
                </div>

                <!-- Tailwind -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-cyan-400/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-yellow-500/10 text-yellow-600 text-[10px] font-black rounded-full border border-yellow-500/20">3+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-cyan-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <svg class="w-10 h-10 text-cyan-400 drop-shadow-[0_0_8px_rgba(34,211,238,0.5)]" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.1267 6.21913C9.17785 5.37821 10.4989 5 12.0014 5C13.41 5 14.4863 5.33092 15.3593 5.83363C16.0983 6.25922 16.7127 6.84126 17.3072 7.44492C17.953 8.10062 18.3034 8.41984 18.7437 8.52979C19.217 8.64811 19.617 8.61249 19.9825 8.45585C20.3621 8.29317 20.7745 7.96918 21.2014 7.4L22.9715 8.24254C22.6005 9.72673 21.9241 10.9425 20.8761 11.7809C19.8249 12.6218 18.5038 13 17.0014 13C15.5931 13 14.517 12.669 13.6441 12.1664C12.8103 11.6862 12.2012 11.068 11.7232 10.583C11.0611 9.9112 10.7056 9.5817 10.2591 9.47021C9.78583 9.35189 9.3858 9.38751 9.02031 9.54415C8.64071 9.70683 8.22828 10.0308 7.80139 10.6L6.03125 9.75746C6.4023 8.27328 7.07869 7.05754 8.1267 6.21913ZM12.0014 7C11.1728 7 10.5057 7.14609 9.96802 7.40781C11.2881 7.49046 12.1492 8.30299 13.0247 9.12911C13.5289 9.60492 14.0379 10.0852 14.6422 10.4332C15.2012 10.7551 15.9313 11 17.0014 11C17.8299 11 18.497 10.8539 19.0347 10.5922C17.7147 10.5095 16.8538 9.69708 15.9786 8.87101C15.4744 8.39515 14.9655 7.91478 14.3612 7.56679C13.8022 7.24491 13.0719 7 12.0014 7ZM3.1267 12.2191C4.17785 11.3782 5.49894 11 7.00139 11C8.41001 11 9.48634 11.3309 10.3593 11.8336C11.0983 12.2592 11.7127 12.8413 12.3072 13.4449C12.953 14.1006 13.3034 14.4198 13.7437 14.5298C14.217 14.6481 14.617 14.6125 14.9825 14.4559C15.3621 14.2932 15.7745 13.9692 16.2014 13.4L17.9715 14.2425C17.6005 15.7267 16.9241 16.9425 15.8761 17.7809C14.8249 18.6218 13.5038 19 12.0014 19C10.5931 19 9.51701 18.669 8.64412 18.1664C7.81033 17.6862 7.20115 17.068 6.72319 16.583C6.06109 15.9112 5.70557 15.5817 5.25911 15.4702C4.78583 15.3519 4.3858 15.3875 4.02031 15.5441C3.64071 15.7068 3.22828 16.0308 2.80139 16.6L1.03125 15.7575C1.4023 14.2733 2.07869 13.0575 3.1267 12.2191ZM7.00136 13C6.17284 13 5.50571 13.1461 4.96802 13.4078C6.28809 13.4905 7.14918 14.303 8.02466 15.1291L8.02467 15.1291C8.52891 15.6049 9.03793 16.0852 9.64217 16.4332C10.2012 16.7551 10.9313 17 12.0014 17C12.8299 17 13.497 16.8539 14.0347 16.5922C12.7147 16.5095 11.8538 15.6971 10.9786 14.871C10.4744 14.3952 9.96546 13.9148 9.36117 13.5668C8.80225 13.2449 8.0719 13 7.00136 13Z"/>
                        </svg>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">Tailwind</span>
                </div>
                
                <!-- Next.js -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-white/10 dark:hover:shadow-white/5">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-green-500/10 text-green-600 text-[10px] font-black rounded-full border border-green-500/20">3+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-blue-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <svg class="w-10 h-10 text-gray-800 dark:text-gray-200 drop-shadow-[0_0_8px_rgba(255,255,255,0.3)]" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.665 21.978C16.758 23.255 14.465 24 12 24 5.377 24 0 18.623 0 12S5.377 0 12 0s12 5.377 12 12c0 3.583-1.574 6.801-4.067 9.001L9.219 7.2H7.2v9.596h1.615V9.251l9.85 12.727Zm-3.332-8.533 1.6 2.061V7.2h-1.6v6.245Z"/>
                        </svg>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">Next.js</span>
                </div>

                <!-- MongoDB -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-green-500/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-sky-500/10 text-sky-600 text-[10px] font-black rounded-full border border-sky-500/20">6+ mths</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-sky-500/5 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <svg class="w-10 h-10 text-green-500 drop-shadow-[0_0_8px_rgba(34,197,94,0.5)]" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.193 9.555c-1.264-5.58-4.252-7.414-4.573-8.115-.28-.394-.53-.954-.735-1.44-.036.495-.055.685-.523 1.184-.723.566-4.438 3.682-4.74 10.02-.282 5.912 4.27 9.435 4.888 9.884l.07.05A73.49 73.49 0 0111.91 24h.481c.114-1.032.284-2.056.51-3.07.417-.296.604-.463.85-.693a11.342 11.342 0 003.639-8.464c.01-.814-.103-1.662-.197-2.218zm-5.336 8.195s0-8.291.275-8.29c.213 0 .49 10.695.49 10.695-.381-.045-.765-1.76-.765-2.405z"/>
                        </svg>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">MongoDB</span>
                </div>

                <!-- Git -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-orange-600/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-blue-500/10 text-blue-600 text-[10px] font-black rounded-full border border-blue-500/20">1+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-blue-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <i class="fa-brands fa-git-alt text-orange-600 drop-shadow-[0_0_8px_rgba(234,88,12,0.5)]" title="Git"></i>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">Git</span>
                </div>

                <!-- GitHub -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-gray-400/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-cyan-500/10 text-cyan-600 text-[10px] font-black rounded-full border border-cyan-500/20">2+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-cyan-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <i class="fa-brands fa-github text-gray-800 dark:text-gray-200 drop-shadow-[0_0_8px_rgba(255,255,255,0.3)]"></i>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">GitHub</span>
                </div>
                
                <!-- Java -->
                <div class="glow-hover group relative p-8 bg-white dark:bg-gray-800/50 backdrop-blur-md rounded-3xl border border-gray-100 dark:border-gray-700/50 text-center hover:shadow-blue-800/20">
                    <div class="absolute top-3 right-3 z-20">
                        <span class="px-2 py-0.5 bg-green-500/10 text-green-600 text-[10px] font-black rounded-full border border-green-500/20">2+ Yrs</span>
                    </div>
                    <div class="w-14 h-14 mx-auto mb-4 bg-green-500/5 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 dark:bg-gray-200">
                        <i class="fa-brands fa-java text-blue-900 drop-shadow-[0_0_8px_rgba(30,58,138,0.5)]"></i>
                    </div>
                    <span class="block font-black text-gray-800 dark:text-gray-100 text-sm tracking-wide">Java</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-spin-slow {
        animation: spin-slow 10s linear infinite;
    }
</style>

<!-- Testimonials Section -->
<section class="py-24 bg-gradient-to-b from-transparent via-gray-50/50 to-transparent dark:via-gray-900/30 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-1/2 left-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute top-1/2 right-0 w-64 h-64 bg-purple-500/5 rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>

    <div class="container max-w-7xl mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-1 mb-4 bg-primary/10 rounded-full">
                <span class="text-xs font-bold text-primary uppercase tracking-widest">Testimonials</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold mb-6 tracking-tight">
                What People <span class="text-primary italic">Say</span>
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">
                Voices from colleagues, mentors, and partners I've had the privilege to work with.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $t): ?>
                <div class="group relative p-8 bg-white/60 dark:bg-gray-800/60 backdrop-blur-xl rounded-[2.5rem] border border-white/40 dark:border-gray-700/40 hover:border-primary/40 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary/5">
                    <!-- Glass reflection effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent dark:from-white/5 opacity-0 group-hover:opacity-100 transition-opacity rounded-[2.5rem]"></div>
                    
                    <!-- Quote and Profile Header -->
                    <div class="flex items-start justify-between mb-8 relative z-10">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-white dark:border-gray-700 shadow-xl group-hover:scale-110 transition-transform duration-500">
                                <img src="<?php echo htmlspecialchars($t['image_url'] ?? 'https://ui-avatars.com/api/?name='.urlencode($t['name'])); ?>" 
                                     alt="<?php echo htmlspecialchars($t['name']); ?>" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-black text-gray-900 dark:text-white group-hover:text-primary transition-colors"><?php echo htmlspecialchars($t['name']); ?></h4>
                                <p class="text-xs text-primary font-bold uppercase tracking-widest mt-1"><?php echo htmlspecialchars($t['role']); ?></p>
                            </div>
                        </div>
                        <div class="text-5xl text-primary/10 font-serif leading-none italic group-hover:text-primary/20 transition-colors">"</div>
                    </div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        <p class="text-gray-600 dark:text-gray-300 italic text-sm leading-relaxed mb-6 font-medium">
                            <?php echo nl2br(htmlspecialchars($t['content'])); ?>
                        </p>
                    </div>

                    <!-- Stars/Rating decoration -->
                    <div class="flex gap-1 text-yellow-400/30 group-hover:text-yellow-400 transition-colors duration-700">
                        <i class="fa-solid fa-star text-[10px]"></i>
                        <i class="fa-solid fa-star text-[10px]"></i>
                        <i class="fa-solid fa-star text-[10px]"></i>
                        <i class="fa-solid fa-star text-[10px]"></i>
                        <i class="fa-solid fa-star text-[10px]"></i>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <?php if (empty($testimonials)): ?>
                <div class="col-span-full py-16 text-center bg-gray-50/50 dark:bg-gray-800/30 backdrop-blur-sm rounded-[2.5rem] border border-dashed border-gray-300 dark:border-gray-700">
                    <div class="text-5xl mb-4 grayscale opacity-50">✍️</div>
                    <p class="text-gray-500 dark:text-gray-400 mb-6 font-medium">Be the first to share your experience!</p>
                    <a href="testimonials.php" class="inline-flex items-center px-8 py-3 bg-primary text-white font-bold rounded-full hover:scale-105 transition-all shadow-lg shadow-primary/20">
                        Leave a Testimonial
                    </a>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-16">
            <a href="testimonials.php" class="group inline-flex items-center gap-3 px-8 py-4 text-primary font-black uppercase text-xs tracking-widest hover:bg-primary/5 rounded-full transition-all">
                Explore All Stories
                <span class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-primary/10 via-transparent to-purple-500/10"></div>
    <div class="container max-w-4xl mx-auto px-4 relative z-10 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">
            Ready to Build Something <span class="text-primary">Amazing</span>?
        </h2>
        <p class="text-xl text-gray-600 dark:text-gray-300 mb-10 max-w-2xl mx-auto">
            Let's discuss your project, collaborate on ideas, or just talk tech. I'm always open to interesting conversations and new opportunities.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="contact.php" class="group inline-flex items-center px-10 py-5 bg-gradient-to-r from-primary to-blue-600 text-white text-lg font-semibold rounded-full hover:scale-105 transition-all duration-300 hover:shadow-2xl hover:shadow-primary/30">
                Start a Conversation
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </a>
            <a href="projects.php" class="group inline-flex items-center px-10 py-5 border-2 border-gray-300 dark:border-gray-700 text-lg font-semibold rounded-full hover:border-primary hover:scale-105 transition-all duration-300">
                Browse Projects
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Add this to your CSS file or in a style tag -->
<style>
    @keyframes gradient {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 6s ease infinite;
    }
    
    .glass {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
</style>

<?php include_once 'src/partials/footer.php'; ?>