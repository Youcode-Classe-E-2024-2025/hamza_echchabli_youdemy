<?php
// if (isset($_SESSION['user'])) {
//     header('Location: /');
//    }


// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Youdemy</title>
    <link rel="stylesheet" href="../css/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <style>
        /* Navbar styles */
        nav {
            width: 100%;
           position:fixed;
            z-index: 1000;
        }
        .RG{
            background-color: #8B0000;
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

        /* Container Styling */
#create-course {
    max-width: 900px;
    margin: 20px auto;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 30px;
    font-family: Arial, sans-serif;
}

/* Heading */
#create-course h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: #2D3748;
    margin-bottom: 20px;
    border-bottom: 2px solid #E2E8F0;
    padding-bottom: 10px;
}

/* Form Layout */
.grid {
    display: grid;
    gap: 20px;
}

/* Responsive Grid */
@media (min-width: 640px) {
    .grid-cols-1 {
        grid-template-columns: 1fr;
    }
    .grid-cols-2 {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Labels */
label {
    display: block;
    font-size: 1rem;
    font-weight: 500;
    color: #4A5568;
    margin-bottom: 6px;
}

/* Input Fields */
input, select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #CBD5E0;
    border-radius: 8px;
    font-size: 1rem;
    color: #2D3748;
    background: #F7FAFC;
    transition: all 0.3s ease;
}

input:focus, select:focus, textarea:focus {
    border-color: #4C51BF;
    box-shadow: 0 0 5px rgba(76, 81, 191, 0.5);
    outline: none;
}

/* Submit Button */
#sendcourse {
    display: inline-block;
    background: #4C51BF;
    color: #ffffff;
    padding: 14px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
    width: 100%;
}

#sendcourse:hover {
    background: #4338CA;
}

/* Tag Preview */
#tag-preview p {
    font-size: 1rem;
    font-weight: 600;
    color: #2D3748;
}

#tag-list {
    font-weight: bold;
    color: #4C51BF;
}

/* Hidden Elements */
.hidden {
    display: none;
}

/* Responsive Design */
@media (max-width: 640px) {
    #create-course {
        padding: 20px;
    }
    #sendcourse {
        width: 100%;
    }
}

        footer{
            position: relative; /* Ensure it doesn't overlap */
            z-index: 1;
        }
    </style>
</head>
<body class="relative min-h-screen bg-gray-50 flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex h-16 items-center justify-between">
                <div class="">
                <a href="/" class="text-2xl font-bold  text-slate-800">Youdemy</a>
                </div>
                <div class=" md:flex space-x-8">
                    <a href="courses?page=0" class="text-slate-600 hover:text-slate-900">COURSES</a>
                    <!-- <a href="courses" class="text-slate-600 hover:text-slate-900">Teach</a> -->
                    <a href="Dash" class="text-slate-600 hover:text-slate-900">My DASHBOARD</a>
                </div>
                <div class="flex items-center space-x-4">

               <a href="handleAuth" class="text-slate-600 hover:text-slate-900">Sign Out</a>
                  
                </div>
            </div>
        </div>
    </nav>

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
        <div id="create-course" class="bg-white shadow rounded-lg p-6 mb-8"><div id="create-course">
    <h2>Ajouter un Nouveau Cours</h2>
    <form id="coursAddContent" action="/manageCourses" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <input name="action" value="add" hidden>
            
            <div>
                <label for="course-title">Titre du Cours</label>
                <input type="text" id="course-title" name="course-title" required>
            </div>

            <div>
                <label for="course-category">Catégorie</label>
                <select id="course-category" name="course-category">
                    <?php if (is_array($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->getId(); ?>"><?php echo htmlspecialchars($category->getName()); ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option disabled>No categories found</option>
                    <?php endif; ?>
                </select>
            </div>

            <div class="sm:col-span-2">
                <label for="course-description">Description</label>
                <textarea id="course-description" name="course-description" rows="4" required></textarea>
            </div>

            <div class="sm:col-span-2">
                <label for="course-tags">Tags</label>
                <select id="course-tags" required onchange="updateTagPreview()">
                    <option value="" disabled selected>Select a tag</option>
                    <?php if (is_array($tags)): ?>
                        <?php foreach ($tags as $tag): ?>
                            <option value="<?php echo $tag->getId(); ?>" data-name="<?php echo htmlspecialchars($tag->getName()); ?>">
                                <?php echo htmlspecialchars($tag->getName()); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option disabled>No tags available</option>
                    <?php endif; ?>
                </select>
            </div>

            <div id="tag-preview" class="sm:col-span-2 mt-2">
                <p>Tags preview: <span id="tag-list"></span></p>
                <input type="text" id="courseTags" name="course-tags" readonly hidden>
            </div>

            <div>
                <label for="chooseType">Type de Contenu</label>
                <select id="chooseType" onchange="toggleContentType()">
                    <option value="video">Vidéo</option>
                    <option value="document">Document</option>
                </select>
            </div>

            <div class="sm:col-span-2 hidden" id="video-content">
                <label for="course-content">Contenu Vidéo</label>
                <input type="file" id="course-content" name="course-content" accept="video/*">
            </div>

            <input id="editorContent" type="hidden" name="md">

            <div id="text-editor" class="sm:col-span-2 mb-4">
                <label for="description">Contenu Texte</label>
                <textarea id="description"></textarea>
            </div>
        </div>

        <button id="sendcourse" type="submit">
            Ajouter le Cours
        </button>
    </form>
</div>

  

        </div>

        <!-- Manage Courses Section -->
        <div class="bg-white shadow rounded-lg  w-full">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Mes cours</h2>
            <div class="positionTable">
                <!-- <table class="fullWith bg-white border border-gray-300 rounded-lg ">
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
                        
                    </tbody>
                </table> 
            </div>
        </div>-->
        <table class="fullWith bg-white border border-gray-300 rounded-lg ">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Titre</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Catégorie</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Créateur</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
            <tr class="border-t border-gray-200">
                <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['titrecour']) ?></td>
                <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['categorie_name']) ?></td>
                <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($course['user_name']) ?></td>
                <td class="px-6 py-4 text-sm text-gray-800 space-x-2">
                <!-- <input name="action" value="add" hidden>/manageCourses -->
                <form action="/manageCourses" method="POST" style="display:inline;">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($course['idcour']); ?>">
    <button type="submit" class="bg-indigo-600 text-white px-3 py-1 rounded-md hover:bg-indigo-700">
        Cancel
    </button>
</form>
                
                <a href="" class="RG text-white px-3 py-1 rounded-md hover:bg-green-700">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


 
        <!-- Course Statistics Section -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Statistiques Globales</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 ">
                <div class="card bg-green-100 text-green-600">
                    <h3 class="font-semibold">Nombre Total de Cours</h3>
                    <p class="text-lg"><?php echo $coursesCount['count'] ?></p>
                </div>
                <div class="card bg-blue-100 text-blue-600">
                    <h3 class="font-semibold">Répartition par Catégorie</h3>
                    <p class="text-lg">

                    <?php 
        foreach ($CategorieC as $category) {
            echo htmlspecialchars($category['name']) . ': ' . htmlspecialchars($category['number']) . '   , ';
        }
        ?>



                    </p>
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
   


<script>
   
    function toggleContentType() {
        const contentType = document.getElementById('chooseType').value;
        const videoContent = document.getElementById('video-content');
        const textEditor = document.getElementById('text-editor');

        // Show/hide the appropriate content input based on selection
        if (contentType === 'video') {
            videoContent.classList.remove('hidden');
            textEditor.classList.add('hidden');
            // Remove TinyMCE if switching to video
        } else if (contentType === 'document') {
            videoContent.classList.add('hidden');
            textEditor.classList.remove('hidden');
             // Initialize TinyMCE if switching to document
             
        }
    }

    // Initialize TinyMCE when document type is selected
    let simplemde = new SimpleMDE({
        element: document.getElementById("description"),
        spellChecker: false,  // Disable spellchecker if not needed
        autosave: {
            enabled: true,
            uniqueId: "myEditor",
            delay: 1000,
        },
        toolbar: [
            "bold", "italic", "heading", "|", 
            "quote", "unordered-list", "ordered-list", "|", 
            "preview", "side-by-side", "fullscreen", "|", 
            "guide"
        ],
        placeholder: "Écrivez quelque chose en Markdown...",
    });

    simplemde.codemirror.on("change", function(){


    simplemde.value()
});

document.getElementById('sendcourse').addEventListener('click' , (e)=>{

    document.getElementById('editorContent').value = simplemde.value();
      


})

function updateTagPreview() {
        var selectElement = document.getElementById('course-tags');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        
        // Get the selected tag's ID and Name
        var tagId = selectedOption.value;
        var tagName = selectedOption.getAttribute('data-name');
        
        // Update the tag preview
        document.getElementById('tag-list').textContent += tagName;
        document.getElementById('tag-list').textContent += ',';
        
        // Update the hidden input value with the selected tag's ID
        document.getElementById('courseTags').value += tagId;
        document.getElementById('courseTags').value += ',';

        console.log();
        
    }



    document.addEventListener('DOMContentLoaded', function() {
        toggleContentType();  // Initialize the content based on current selection
    });

</script>

</body>
</html>
