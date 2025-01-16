<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details - Youdemy</title>
    <link rel="stylesheet" href="../css/output.css">
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
                <div class="">
                <a href="/" class="text-2xl font-bold  text-slate-800">Youdemy</a>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="courses" class="text-slate-600 hover:text-slate-900">COURSES</a>
                    <a href="courses" class="text-slate-600 hover:text-slate-900">Teach</a>
                    <a href="Dash" class="text-slate-600 hover:text-slate-900">My DASHBOARD</a>
                </div>
                <div class="flex items-center space-x-4">

                 <a href="handleAuth" class="text-slate-600 hover:text-slate-900">Sign Out</a>
               
                    <a href="" class="bg-slate-800 text-white px-4 py-2 rounded-lg hover:bg-slate-700">
                        Start Learning
                    </a>
                </div>
            </div>
        </div>
    </nav>

      
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-4"><?php   echo  $courses[0]['titrecour'] ;?></h1>
            <div class="flex flex-wrap gap-4 mb-6">
                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-medium">#Frontend</span>
                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-medium">#JavaScript</span>
                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-md text-sm font-medium">Category:<?php   echo  $courses[0]['categorie_id'] ;?></span>
                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-md text-sm font-medium">Creator: <?php   echo  $courses[0]['user_id'] ;?></span>
            </div>

            <!-- Course Description -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Description</h2>
                <p class="text-gray-600 leading-relaxed">
                    <?php   echo $courses[0]['descriptioncour']; ?>
                </p>
            </div>

            <!-- Metrics -->
            <div class="flex items-center gap-6 mb-6">
                <div class="flex items-center bg-green-100 text-green-600 px-4 py-2 rounded-md text-sm font-medium">
                    <span>👨‍🎓</span> <span class="ml-2">1,234 students enrolled</span>
                </div>
                <div class="flex items-center bg-yellow-100 text-yellow-600 px-4 py-2 rounded-md text-sm font-medium">
                    <span>👁️</span> <span class="ml-2">2,345 views</span>
                </div>
            </div>

            <!-- Course Content -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">What You'll Learn</h2>
                <p class="text-gray-600 leading-relaxed">
                    <?php   echo $courses[0]['details']; ?>
                </p>
            </div>

            <!-- Enroll Button -->
            <div class="text-center">
                <button class="bg-indigo-600 text-white px-8 py-3 rounded-md text-lg font-semibold hover:bg-indigo-700">
                    Enroll Now
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Company -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">About Us</a></li>
                        <li><a href="#" class="hover:text-white">Careers</a></li>
                        <li><a href="#" class="hover:text-white">Press</a></li>
                    </ul>
                </div>

                <!-- Community -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Community</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                        <li><a href="#" class="hover:text-white">Teachers</a></li>
                        <li><a href="#" class="hover:text-white">Affiliates</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Help Center</a></li>
                        <li><a href="#" class="hover:text-white">Terms</a></li>
                        <li><a href="#" class="hover:text-white">Privacy</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white">Support</a></li>
                        <li><a href="#" class="hover:text-white">Feedback</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p>© 2025 Youdemy. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
