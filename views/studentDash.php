<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Youdemy</title>
    <link rel="stylesheet" href="../css/output.css">
    <style>
        .bgDEBTN{
            background-color: brown;
        }
        .positionTable{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .fullWith{
            width: 90%;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="">  <a href="/" class="text-2xl font-bold  text-slate-800">Youdemy</a></div>
                <div class="hidden md:flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Mes cours</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Profile</a>
                </div>
                <div class="flex space-x-4">
                    <a href="handleAuth" class="text-indigo-600 hover:text-indigo-700">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Dashboard</h1>

        <!-- "Mes cours" Section -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Mes cours</h2>
            <div class="positionTable">
                <table class="fullWith bg-white border border-gray-300 rounded-lg ">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Titre</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Catégorie</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Créateur</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Étudiants</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Vues</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row -->
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-4 text-sm text-gray-800">UX Design Fundamentals</td>
                            <td class="px-6 py-4 text-sm text-gray-800">Design</td>
                            <td class="px-6 py-4 text-sm text-gray-800">Mike Johnson</td>
                            <td class="px-6 py-4 text-sm text-gray-800">987</td>
                            <td class="px-6 py-4 text-sm text-gray-800">1,234</td>
                            <td class="px-6 py-4 text-sm text-gray-800 space-x-2">
                                <button class="bg-indigo-600 text-white px-3 py-1 rounded-md hover:bg-indigo-700">Details</button>
                                <button class="bgDEBTN text-white px-3 py-1 rounded-md hover:bg-green-700">Enrolle</button>
                            </td>
                        </tr>
                        <!-- Add more rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
