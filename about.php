<?php 
// Include any necessary database connection if needed
require_once 'config/db.php';
include_once 'src/partials/header.php'; 
?>

<!-- Hero Banner -->
<section class="relative py-20 overflow-hidden">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-900/20"></div>
    <div class="absolute top-20 right-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-10 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"></div>
    
    <div class="container max-w-6xl mx-auto px-4 relative z-10">
        <!-- Profile Header -->
        <div class="flex flex-col lg:flex-row items-center gap-12 mb-16">
            <!-- Profile Image/Avatar -->
            <div class="relative">
                <div class="w-64 h-64 bg-gradient-to-br from-primary to-blue-600 rounded-3xl shadow-2xl flex items-center justify-center relative group">
                    <img src="assets/images/profile.png" class="w-full h-full object-cover rounded-3xl" alt="Profile">
                    <div class="absolute inset-0 border-4 border-white/20 rounded-3xl"></div>
                    <!-- Animated ring -->
                    <div class="absolute -inset-4 border-2 border-primary/30 rounded-[2rem] animate-ping"></div>
                </div>
                <div class="absolute -bottom-3 -right-3 w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <span class="text-2xl">👨‍💻</span>
                </div>
            </div>
            
            <!-- Intro Text -->
            <div class="flex-1 text-center lg:text-left">
                <div class="inline-block px-4 py-1.5 bg-primary/10 rounded-full mb-4">
                    <span class="text-sm font-medium text-primary">About Me</span>
                </div>
                <h1 class="text-5xl lg:text-6xl font-bold mb-4">
                    <span class="text-gray-800 dark:text-white">Eyasu</span>
                    <span class="text-primary"> Zerihun</span>
                </h1>
                <div class="text-xl text-gray-600 dark:text-gray-300 mb-6">
                    <span class="font-semibold text-primary">Software Engineering Student</span> • 
                    <span class="font-semibold text-blue-600">Back-end Developer</span> • 
                    <span class="font-semibold text-purple-600">AI Enthusiast</span>
                </div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl">
                    Passionate about building robust systems, exploring artificial intelligence, and creating solutions that make a difference.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-20">
    <div class="container max-w-6xl mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Left Column - Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Biography -->
                <div class="relative group">
                    <div class="absolute -left-6 top-0 w-1 h-full bg-gradient-to-b from-primary to-blue-600 rounded-full"></div>
                    <div class="pl-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary/20 to-blue-500/20 rounded-xl flex items-center justify-center">
                                <span class="text-2xl">📖</span>
                            </div>
                            <h2 class="text-3xl font-bold">My Journey</h2>
                        </div>
                        <div class="space-y-4 text-gray-600 dark:text-gray-300">
                            <p class="text-lg leading-relaxed">
                                Hello! I'm <span class="font-semibold text-primary">Eyasu Zerihun</span>, also known as 
                                <span class="font-mono bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">joshz-090</span>. 
                                As a 3rd-year Software Engineering student, my fascination with technology began with a simple question: 
                                "How do things work?" This curiosity has evolved into a passionate pursuit of understanding and building complex systems.
                            </p>
                            <p class="text-lg leading-relaxed">
                                My journey started with basic automation scripts and has grown into a deep interest in 
                                <span class="font-semibold text-primary">back-end architecture</span> and 
                                <span class="font-semibold text-purple-600">artificial intelligence</span>. 
                                I believe in writing code that not only solves problems but also tells a story of elegant solutions.
                            </p>
                            <p class="text-lg leading-relaxed">
                                Beyond coding, I'm passionate about <span class="font-semibold">mentoring beginners</span>, 
                                <span class="font-semibold">contributing to open-source projects</span>, and staying at the 
                                forefront of technological innovation through continuous learning.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Education & Goals -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Education Card -->
                    <div class="group relative p-8 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-primary transition-all duration-300 hover:shadow-xl hover:shadow-primary/10">
                        <div class="absolute -top-4 left-8 w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="text-3xl">🎓</span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-xl font-bold mb-4">Education</h3>
                            <div class="space-y-3">
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">B.Sc. Software Engineering</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Current: 3rd Year Student</p>
                                    <p class="text-sm text-gray-500">Expected Graduation: 2026</p>
                                </div>
                                <div class="pt-3 border-t border-gray-100 dark:border-gray-700">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Focus areas: Algorithms, Database Systems, Software Architecture, AI Fundamentals
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Career Goals Card -->
                    <div class="group relative p-8 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-purple-500 transition-all duration-300 hover:shadow-xl hover:shadow-purple-500/10">
                        <div class="absolute -top-4 left-8 w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="text-3xl">🚀</span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-xl font-bold mb-4">Career Vision</h3>
                            <div class="space-y-3">
                                <p class="text-gray-600 dark:text-gray-400">
                                    Aspiring to become a <span class="font-semibold text-purple-600">Lead AI Engineer</span>, 
                                    building intelligent systems that solve real-world problems in efficiency, sustainability, and accessibility.
                                </p>
                                <div class="pt-3 border-t border-gray-100 dark:border-gray-700">
                                    <h4 class="text-sm font-semibold mb-2">Short-term Goals:</h4>
                                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Master Django & Flask ecosystems</li>
                                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Complete ML specialization</li>
                                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Contribute to open-source AI projects</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Professional Certifications -->
                <div class="relative group mt-12">
                    <div class="absolute -left-6 top-0 w-1 h-full bg-gradient-to-b from-yellow-500 to-orange-600 rounded-full"></div>
                    <div class="pl-8">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500/20 to-orange-500/20 rounded-xl flex items-center justify-center">
                                <span class="text-2xl">📜</span>
                            </div>
                            <h2 class="text-3xl font-bold">Professional Certifications</h2>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- CS50 Card -->
                            <div class="group/card p-4 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-red-500 transition-all duration-300">
                                <div class="relative overflow-hidden rounded-xl mb-4 aspect-video bg-gray-100 dark:bg-gray-700">
                                    <img src="assets/images/cs50.png" class="w-full h-full object-cover group-hover/card:scale-110 transition-transform duration-500" alt="CS50 Certificate">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/card:opacity-100 transition-opacity flex items-center justify-center">
                                        <a href="assets/images/cs50.png" target="_blank" class="p-2 bg-white rounded-full text-red-600 hover:scale-110 transition-transform">
                                            <i class="fas fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-1">CS50: Computer Science</h3>
                                <p class="text-xs text-primary font-medium mb-2 uppercase tracking-wider">Harvard University</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                    Foundational concepts of computer science and programming.
                                </p>
                            </div>

                            <!-- CS50 Python Card -->
                            <div class="group/card p-4 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-blue-500 transition-all duration-300">
                                <div class="relative overflow-hidden rounded-xl mb-4 aspect-video bg-gray-100 dark:bg-gray-700">
                                    <img src="assets/images/python.png" class="w-full h-full object-cover group-hover/card:scale-110 transition-transform duration-500" alt="CS50 Python Certificate">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/card:opacity-100 transition-opacity flex items-center justify-center">
                                        <a href="assets/images/python.png" target="_blank" class="p-2 bg-white rounded-full text-blue-600 hover:scale-110 transition-transform">
                                            <i class="fas fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-1">CS50: Python Programming</h3>
                                <p class="text-xs text-primary font-medium mb-2 uppercase tracking-wider">Harvard University</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                    Advanced Python programming and application development.
                                </p>
                            </div>

                            <!-- Udacity AI Card -->
                            <div class="group/card p-4 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-purple-500 transition-all duration-300">
                                <div class="relative overflow-hidden rounded-xl mb-4 aspect-video bg-gray-100 dark:bg-gray-700">
                                    <img src="assets/images/ai.png" class="w-full h-full object-cover group-hover/card:scale-110 transition-transform duration-500" alt="Udacity AI Certificate">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/card:opacity-100 transition-opacity flex items-center justify-center">
                                        <a href="assets/images/ai.png" target="_blank" class="p-2 bg-white rounded-full text-purple-600 hover:scale-110 transition-transform">
                                            <i class="fas fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-1">AI Fundamentals</h3>
                                <p class="text-xs text-primary font-medium mb-2 uppercase tracking-wider">Udacity Nanodegree</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                    Exploring intelligent systems and machine learning models.
                                </p>
                            </div>

                            <!-- Udacity Data Analysis Card -->
                            <div class="group/card p-4 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-teal-500 transition-all duration-300">
                                <div class="relative overflow-hidden rounded-xl mb-4 aspect-video bg-gray-100 dark:bg-gray-700">
                                    <img src="assets/images/dataanalysis.png" class="w-full h-full object-cover group-hover/card:scale-110 transition-transform duration-500" alt="Udacity Data Analysis Certificate">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/card:opacity-100 transition-opacity flex items-center justify-center">
                                        <a href="assets/images/dataanalysis.png" target="_blank" class="p-2 bg-white rounded-full text-teal-600 hover:scale-110 transition-transform">
                                            <i class="fas fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-1">Data Analysis</h3>
                                <p class="text-xs text-primary font-medium mb-2 uppercase tracking-wider">Udacity Nanodegree</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                    Processing and visualizing data to drive insight.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Philosophy -->
                <div class="relative group">
                    <div class="absolute -left-6 top-0 w-1 h-full bg-gradient-to-b from-purple-500 to-pink-600 rounded-full"></div>
                    <div class="pl-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-xl flex items-center justify-center">
                                <span class="text-2xl">💭</span>
                            </div>
                            <h2 class="text-3xl font-bold">Development Philosophy</h2>
                        </div>
                        <div class="relative p-8 bg-gradient-to-br from-primary/5 to-blue-500/5 rounded-2xl border border-primary/20">
                            <div class="absolute top-4 left-4 text-4xl text-primary/30">"</div>
                            <blockquote class="text-xl italic text-gray-700 dark:text-gray-300 leading-relaxed pl-8">
                                Code is not just for computers to execute; it is for humans to read, for teams to collaborate on, 
                                and for the future to build upon. Every line should tell a story of thoughtful problem-solving.
                            </blockquote>
                            <div class="absolute bottom-4 right-4 text-4xl text-primary/30 rotate-180">"</div>
                        </div>
                        <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                                <div class="text-2xl mb-2">🧹</div>
                                <span class="text-sm font-medium">Clean Code</span>
                            </div>
                            <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                                <div class="text-2xl mb-2">⚡</div>
                                <span class="text-sm font-medium">Performance</span>
                            </div>
                            <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                                <div class="text-2xl mb-2">🔧</div>
                                <span class="text-sm font-medium">Maintainable</span>
                            </div>
                            <div class="text-center p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700">
                                <div class="text-2xl mb-2">📚</div>
                                <span class="text-sm font-medium">Documentation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Skills & Stats -->
            <div class="space-y-8">
                <!-- Skills Progress -->
                <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 p-8">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500/20 to-emerald-500/20 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">📊</span>
                        </div>
                        <h2 class="text-2xl font-bold">Skills Mastery</h2>
                    </div>
                    
                    <div class="space-y-6">
                        <!-- Backend Skills -->
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="font-medium text-gray-800 dark:text-white">Backend Development</span>
                                <span class="font-bold text-primary">90%</span>
                            </div>
                            <div class="w-full h-3 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-primary to-blue-600 rounded-full relative" style="width: 90%">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/20 animate-shimmer"></div>
                                </div>
                            </div>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-xs">Django</span>
                                <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-full text-xs">Flask</span>
                                <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400 rounded-full text-xs">Python</span>
                            </div>
                        </div>

                        <!-- AI/ML Skills -->
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="font-medium text-gray-800 dark:text-white">AI & Machine Learning</span>
                                <span class="font-bold text-purple-600">75%</span>
                            </div>
                            <div class="w-full h-3 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-purple-500 to-pink-600 rounded-full relative" style="width: 75%">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/20 animate-shimmer"></div>
                                </div>
                            </div>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-full text-xs">TensorFlow</span>
                                <span class="px-3 py-1 bg-pink-100 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400 rounded-full text-xs">PyTorch</span>
                                <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400 rounded-full text-xs">Scikit-learn</span>
                            </div>
                        </div>

                        <!-- Frontend Skills -->
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="font-medium text-gray-800 dark:text-white">Frontend Development</span>
                                <span class="font-bold text-green-600">85%</span>
                            </div>
                            <div class="w-full h-3 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-green-500 to-emerald-600 rounded-full relative" style="width: 85%">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/20 animate-shimmer"></div>
                                </div>
                            </div>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-xs">React</span>
                                <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-full text-xs">Tailwind</span>
                                <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400 rounded-full text-xs">JavaScript</span>
                            </div>
                        </div>

                        <!-- Database Skills -->
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="font-medium text-gray-800 dark:text-white">Databases</span>
                                <span class="font-bold text-indigo-600">80%</span>
                            </div>
                            <div class="w-full h-3 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-indigo-500 to-blue-600 rounded-full relative" style="width: 80%">
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/20 animate-shimmer"></div>
                                </div>
                            </div>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-full text-xs">MySQL</span>
                                <span class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-full text-xs">PostgreSQL</span>
                                <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-xs">MongoDB</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 p-8">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500/20 to-orange-500/20 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">📈</span>
                        </div>
                        <h2 class="text-2xl font-bold">Quick Stats</h2>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-xl border border-blue-200 dark:border-blue-800/30">
                            <div class="text-3xl font-bold text-primary mb-1">3+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Years Learning</div>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-xl border border-green-200 dark:border-green-800/30">
                            <div class="text-3xl font-bold text-green-600 mb-1">10+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Projects</div>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-xl border border-purple-200 dark:border-purple-800/30">
                            <div class="text-3xl font-bold text-purple-600 mb-1">4+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Languages</div>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20 rounded-xl border border-pink-200 dark:border-pink-800/30">
                            <div class="text-3xl font-bold text-pink-600 mb-1">100+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">Git Commits</div>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-gradient-to-r from-primary/5 to-blue-500/5 rounded-xl border border-primary/20">
                        <p class="text-sm text-center text-gray-600 dark:text-gray-400">
                            "Always learning, always building."
                        </p>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="bg-gradient-to-br from-primary/10 to-blue-500/10 rounded-2xl border border-primary/20 p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-primary to-blue-600 rounded-2xl flex items-center justify-center">
                        <span class="text-3xl text-white">💼</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Let's Work Together</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Interested in collaborating on a project or have an opportunity?
                    </p>
                    <a href="contact.php" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-blue-600 text-white font-semibold rounded-full hover:scale-105 transition-transform">
                        Get in Touch
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSS Animation -->
<style>
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    .animate-shimmer {
        animation: shimmer 2s infinite;
    }
</style>

<?php include_once 'src/partials/footer.php'; ?>