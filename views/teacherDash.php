<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Youdemy</title>
    <link rel="stylesheet" href="../css/output.css">
    <style>
        /* Navbar styles */
        .navbar {
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .navbar a {
           
            font-size: 1rem;
            text-decoration: none;
            margin: 0 1rem;
            transition: color 0.3s;
        }
         .others{ color: #4A5568;}
        .navbar a:hover {
            color: #1A202C;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4A5568;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            height: 100vh;
            position: fixed;
            top: 50px; /* Adjusted for navbar height */
            left: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding-top: 1rem;
        }

        .sidebar a {
            display: block;
            padding: 1rem;
            font-size: 1rem;
            color: #4A5568;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #F3F4F6;
            color: #1A202C;
        }

        /* Main content styles */
        .main-content {
            margin-left: 250px;
            margin-top: 64px; /* Adjusted for navbar height */
            padding: 2rem;
        }
        .bgDEBTN{
            background-color: brown;
        }
        .card{
            width: 70%;
            margin: auto;
            border-radius: 5px;
            text-align: center;
        }
        .positionTable{
            width: 90%;
            margin: auto;
        }
        .textColor{
            color: white;
        }
        footer{
            position: relative; /* Ensure it doesn't overlap */
            z-index: 1;
        }
    </style>
</head>
<body class="relative min-h-screen bg-gray-50 flex flex-col">

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">Youdemy</div>
        <div>
            <a href="#dashboard" class="others">Mes Cours</a>
            <a href="#" class="bg-slate-800 textColor px-4 py-2 rounded-lg hover:bg-slate-700">Se déconnecter</a>
        </div>
    </div>

    <main class="relative">

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#create-course">Créer un cours</a>
        <a href="#manage-courses">Gérer les cours</a>
        <a href="#statistics">Statistiques</a>
    </div>

    <!-- Main Content -->
    <div class="main-content flex-grow">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Teacher Dashboard</h1>

        <!-- Add New Course Section -->
        <div id="create-course" class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Ajouter un Nouveau Cours</h2>
            <form action="#" method="POST">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="course-title" class="block text-sm font-medium text-gray-700">Titre du Cours</label>
                        <input type="text" id="course-title" name="course-title" class="mt-1 block w-full p-2 border rounded-lg" required>
                    </div>
                    <div>
                        <label for="course-category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <select id="course-category" name="course-category" class="mt-1 block w-full p-2 border rounded-lg">
                            <option value="design">Design</option>
                            <option value="development">Development</option>
                            <option value="data-science">Data Science</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="course-description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="course-description" name="course-description" rows="4" class="mt-1 block w-full p-1 border rounded-lg" required></textarea>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="course-content" class="block text-sm font-medium text-gray-700">Contenu (Vidéo ou Document)</label>
                        <input type="file" id="course-content" name="course-content" class="mt-1 block w-full p-2 border rounded-lg" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="course-tags" class="block text-sm font-medium text-gray-700">Tags</label>
                        <input type="text" id="course-tags" name="course-tags" class="mt-1 block w-full p-2 border rounded-lg" placeholder="e.g., UX, Design, Web" required>
                    </div>
                </div>
                <button type="submit" class="mt-4 bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">
                    Ajouter le Cours
                </button>
            </form>
        </div>

        <!-- Manage Courses Section -->
        <div class="bg-white shadow rounded-lg  w-full">
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
                                <button class="bg-indigo-600 text-white px-3 py-1 rounded-md hover:bg-indigo-700">cancel</button>
                                <button class="bgDEBTN text-white px-3 py-1 rounded-md hover:bg-green-700">Update</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-4 text-sm text-gray-800">UX Design Fundamentals</td>
                            <td class="px-6 py-4 text-sm text-gray-800">Design</td>
                            <td class="px-6 py-4 text-sm text-gray-800">Mike Johnson</td>
                            <td class="px-6 py-4 text-sm text-gray-800">987</td>
                            <td class="px-6 py-4 text-sm text-gray-800">1,234</td>
                            <td class="px-6 py-4 text-sm text-gray-800 space-x-2">
                                <button class="bg-indigo-600 text-white px-3 py-1 rounded-md hover:bg-indigo-700">cancel</button>
                                <button class="bgDEBTN text-white px-3 py-1 rounded-md hover:bg-green-700">Update</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-4 text-sm text-gray-800">UX Design Fundamentals</td>
                            <td class="px-6 py-4 text-sm text-gray-800">Design</td>
                            <td class="px-6 py-4 text-sm text-gray-800">Mike Johnson</td>
                            <td class="px-6 py-4 text-sm text-gray-800">987</td>
                            <td class="px-6 py-4 text-sm text-gray-800">1,234</td>
                            <td class="px-6 py-4 text-sm text-gray-800 space-x-2">
                                <button class="bg-indigo-600 text-white px-3 py-1 rounded-md hover:bg-indigo-700">cancel</button>
                                <button class="bgDEBTN text-white px-3 py-1 rounded-md hover:bg-green-700">Update</button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-4 text-sm text-gray-800">UX Design Fundamentals</td>
                            <td class="px-6 py-4 text-sm text-gray-800">Design</td>
                            <td class="px-6 py-4 text-sm text-gray-800">Mike Johnson</td>
                            <td class="px-6 py-4 text-sm text-gray-800">987</td>
                            <td class="px-6 py-4 text-sm text-gray-800">1,234</td>
                            <td class="px-6 py-4 text-sm text-gray-800 space-x-2">
                                <button class="bg-indigo-600 text-white px-3 py-1 rounded-md hover:bg-indigo-700">cancel</button>
                                <button class="bgDEBTN text-white px-3 py-1 rounded-md hover:bg-green-700">Update</button>
                            </td>
                        </tr>
                        <!-- Add more rows here -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Course Statistics Section -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Statistiques Globales</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 ">
                <div class="card bg-green-100 text-green-600">
                    <h3 class="font-semibold">Nombre Total de Cours</h3>
                    <p class="text-lg">123</p>
                </div>
                <div class="card bg-blue-100 text-blue-600">
                    <h3 class="font-semibold">Répartition par Catégorie</h3>
                    <p class="text-lg">Développement: 45, Design: 35, Data Science: 43</p>
                </div>
                <div class="card bg-yellow-100 text-yellow-600 shadow-md rounded-lg p-4">
                    <h3 class="font-semibold text-lg mb-2">Nombre d'Étudiants inscrits</h3>
                    <p class="text-yellow-700 text-lg">(987 étudiants)</p>
                </div>
                
                
            </div>
        </div>
    </div>

    </main>

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
