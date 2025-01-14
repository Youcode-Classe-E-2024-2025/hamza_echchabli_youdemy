<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Professional Learning</title>
    <link rel="stylesheet" href="css/output.css">
</head>
<body class="bg-slate-50">
    <!-- Navigation - Simple but distinctive -->
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex h-16 items-center justify-between">
                <div class="text-2xl font-bold text-slate-800">Youdemy</div>
                <div class="hidden md:flex space-x-8">
                    <a href="courses" class="text-slate-600 hover:text-slate-900">COURSES</a>
                    <a href="courses" class="text-slate-600 hover:text-slate-900">Teach</a>
                    <a href="dash" class="text-slate-600 hover:text-slate-900">My DASHBOARD</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="auth" class="text-slate-600 hover:text-slate-900">Sign In</a>
                    <a href="" class="bg-slate-800 text-white px-4 py-2 rounded-lg hover:bg-slate-700">
                        Start Learning
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero - Clean and focused -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl font-bold text-slate-800 mb-6">
                        Master the skills you need, 
                        at your own pace
                    </h1>
                    <p class="text-lg text-slate-600 mb-8">
                        Join over 1 million learners already learning with Youdemy's expert-led courses
                    </p> 
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input type="text" 
                               placeholder="What do you want to learn?"
                               class="flex-1 px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500">
                        <button class="bg-slate-800 text-white px-6 py-3 rounded-lg hover:bg-slate-700">
                            Find Courses
                        </button>
                    </div>
                </div>
                <div class="bg-slate-100 p-8 rounded-lg">
                    <div class="text-sm font-medium text-slate-500 mb-4">TRENDING Categories</div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded-lg border border-slate-200">
                            <div class="font-medium text-slate-800">Data Science</div>
                            <div class="text-sm text-slate-500">148 Courses</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg border border-slate-200">
                            <div class="font-medium text-slate-800">UX Design</div>
                            <div class="text-sm text-slate-500">89 Courses</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg border border-slate-200">
                            <div class="font-medium text-slate-800">Python</div>
                            <div class="text-sm text-slate-500">235 Courses</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg border border-slate-200">
                            <div class="font-medium text-slate-800">Marketing</div>
                            <div class="text-sm text-slate-500">156 Courses</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Featured Courses</h2>
        <a href="courses" class="text-indigo-600 hover:text-indigo-700">View All &rarr;</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Course Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold mb-4">Introduction to React</h3>
            <div class="flex flex-wrap gap-2 mb-4">
                <span class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">JavaScript</span>
                <span class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">React</span>
                <span class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">Frontend</span>
            </div>
            <div class="bg-gray-100 text-gray-700 text-sm px-4 py-2 rounded mb-4">Category: Development</div>
            <div class="bg-gray-100 text-gray-700 text-sm px-4 py-2 rounded mb-4">Creator: John Doe</div>
            <div class="flex justify-between items-center mb-4">
                <div class="bg-green-100 text-green-600 text-sm px-4 py-2 rounded">Students: 1,234</div>
                <div class="bg-yellow-100 text-yellow-600 text-sm px-4 py-2 rounded">Views: 2,345</div>
            </div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
              <a href="details">View Details</a>  
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold mb-4">Python for Beginners</h3>
            <div class="flex flex-wrap gap-2 mb-4">
                <span class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">Python</span>
                <span class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">Programming</span>
            </div>
            <div class="bg-gray-100 text-gray-700 text-sm px-4 py-2 rounded mb-4">Category: Development</div>
            <div class="bg-gray-100 text-gray-700 text-sm px-4 py-2 rounded mb-4">Creator: Jane Smith</div>
            <div class="flex justify-between items-center mb-4">
                <div class="bg-green-100 text-green-600 text-sm px-4 py-2 rounded">Students: 2,345</div>
                <div class="bg-yellow-100 text-yellow-600 text-sm px-4 py-2 rounded">Views: 4,567</div>
            </div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                View Details
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold mb-4">UX Design Fundamentals</h3>
            <div class="flex flex-wrap gap-2 mb-4">
                <span class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">UX</span>
                <span class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">Design</span>
            </div>
            <div class="bg-gray-100 text-gray-700 text-sm px-4 py-2 rounded mb-4">Category: Design</div>
            <div class="bg-gray-100 text-gray-700 text-sm px-4 py-2 rounded mb-4">Creator: Mike Johnson</div>
            <div class="flex justify-between items-center mb-4">
                <div class="bg-green-100 text-green-600 text-sm px-4 py-2 rounded">Students: 987</div>
                <div class="bg-yellow-100 text-yellow-600 text-sm px-4 py-2 rounded">Views: 1,234</div>
            </div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                View Details
            </button>
        </div>
    </div>
</div>

    <!-- Categories Section -->
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Top Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Category 1 -->
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <span class="text-indigo-600 text-4xl">📚</span>
                    <h3 class="text-xl font-semibold mb-2 mt-4">Development</h3>
                    <p class="text-gray-600">1,200 courses</p>
                </div>

                <!-- Category 2 -->
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <span class="text-indigo-600 text-4xl">💼</span>
                    <h3 class="text-xl font-semibold mb-2 mt-4">Business</h3>
                    <p class="text-gray-600">800 courses</p>
                </div>

                <!-- Category 3 -->
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <span class="text-indigo-600 text-4xl">🎨</span>
                    <h3 class="text-xl font-semibold mb-2 mt-4">Design</h3>
                    <p class="text-gray-600">600 courses</p>
                </div>

                <!-- Category 4 -->
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <span class="text-indigo-600 text-4xl">📈</span>
                    <h3 class="text-xl font-semibold mb-2 mt-4">Marketing</h3>
                    <p class="text-gray-600">450 courses</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-indigo-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Start Teaching With Us
                </h2>
                <p class="text-xl text-indigo-100 mb-8">
                    Join thousands of instructors and earn money sharing your knowledge
                </p>
                <button class="bg-white text-indigo-600 px-8 py-3 rounded-md text-lg font-semibold hover:bg-gray-100">
                    Become an Instructor
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