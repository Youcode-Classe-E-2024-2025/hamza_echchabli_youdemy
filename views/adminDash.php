<?php

// echo ini_get('session.save_path');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Youdemy</title>
    <link rel="stylesheet" href="../css/output.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

    <style>
        .bgPrimary {
            background-color: #4F46E5; /* Indigo */
        }
        .bgDanger {
            background-color: #EF4444; /* Red */
        }
        .bgSuccess {
            background-color: #10B981; /* Green */
        }
        .mA-1{
            margin: 4px;
        }
        .card {
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
  
        .btnColor{
            background-color: rgba(239, 121, 219);;
        }
        table tbody tr td{
            height:40px ;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="text-2xl font-bold text-indigo-600">  <a href="/" class="text-2xl font-bold  text-slate-800">Youdemy</a></div>
                <div class="hidden md:flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Utilisateurs</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">Statistiques</a>
                </div>
                <div class="flex space-x-4">
                    <a href="handleAuth" class="text-indigo-600 hover:text-indigo-700">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Admin Dashboard -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Admin Dashboard</h1>

        <!-- Validation des Comptes Enseignants -->
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Validation des Comptes Enseignants</h2>
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Nom</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Rôle</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">State</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
        </tr>
    </thead>
    <tbody>
        
        <?php if (!empty($NonValide)): ?>
            <?php foreach ($NonValide as $user): ?>
                <tr class="border-t border-gray-200">
                    <td class="px-6 h-fit py-4 text-sm text-gray-800"><?= htmlspecialchars($user['name']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($user['email']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($user['role']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800">Inactive</td>
                    <td class="px-6 py-4 text-sm text-gray-800 space-x-2">
                        <a class="bgSuccess mA-1 text-white px-3 py-1 rounded-md hover:bg-green-700" href="manage?action=activer&id=<?php echo $user['id'] ;?>" >Activate</a>
                        <a class="bgDanger mA-1 text-white px-3 py-1 rounded-md hover:bg-red-700"  href="manage?action=banne&id=<?php echo $user['id'] ;?>" >Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="px-6 py-4 text-sm text-gray-800 text-center">No non-validated users found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

        </div>

        <!-- Gestion des Utilisateurs -->
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Gestion des Utilisateurs</h2>
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Nom</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Rôle</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">State</th>
            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through non-validated users -->
        <?php if (!empty($valide)): ?>
            <?php foreach ($valide as $user): ?>
                <tr class="border-t border-gray-200">
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($user['name']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($user['email']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800"><?= htmlspecialchars($user['role']) ?></td>
                    <td class="px-6 py-4 text-sm text-gray-800">active</td>
                    <td class="px-6 py-4 text-sm text-gray-800 space-x-2">
                        <!-- <a class="bgSuccess mA-1 text-white px-3 py-1 rounded-md hover:bg-green-700" href="manage?action=activer&id=<?php echo $user['id'] ;?>">Activer</a> -->
                        <a class="bgDanger mA-1 text-white px-3 py-1 rounded-md hover:bg-red-700" href="manage?action=suspende&id=<?php echo $user['id'] ;?>" >Suspendre</a> 
                        <a class="bgDanger mA-1 text-white px-3 py-1 rounded-md btnColor" href="manage?action=banne&id=<?php echo $user['id'] ;?>" >banne</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="px-6 py-4 text-sm text-gray-800 text-center">No non-validated users found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

        </div>

    <!-- Gestion des catégories -->
<div class="bg-white shadow rounded-lg p-6 mb-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Gestion des catégories</h2>
    <p class="text-gray-700 mb-4">Ajouter des catégories en masse pour simplifier la gestion des cours.</p>
    <form action="#" method="POST">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="categories" class="block text-sm font-medium text-gray-700">Nouveaux Tags</label>
                <input id="categories" name="categories" class="mt-1 block w-full p-2 border rounded-lg" placeholder="Catégorie 1, Catégorie 2, Catégorie 3" required>
            </div>
        </div>
        <button type="submit" class="mt-4 bgPrimary text-white px-6 py-2 rounded-md hover:bg-indigo-700">
            Ajouter des catégories
        </button>
    </form>
</div>

<!-- Gestion des tags -->
<div class="bg-white shadow rounded-lg p-6 mb-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Gestion des Contenus</h2>
    <p class="text-gray-700 mb-4">Ajouter des tags en masse pour simplifier la gestion des cours.</p>
    <form action="#" method="POST">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <label for="tags" class="block text-sm font-medium text-gray-700">Nouveaux Tags</label>
                <input id="tags" name="tags" class="mt-1 block w-full p-2 border rounded-lg" placeholder="Tag1, Tag2, Tag3" required>
            </div>
        </div>
        <button type="submit" class="mt-4 bgPrimary text-white px-6 py-2 rounded-md hover:bg-indigo-700">
            Ajouter des Tags
        </button>
    </form>
</div>

        <!-- Statistiques -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Statistiques Globales</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="card bg-green-100 text-green-600">
                    <h3 class="font-semibold">Nombre Total de Cours</h3>
                    <p class="text-lg"><?php echo $number[0] ;?></p>
                
                </div>
                
                <div class="card bg-blue-100 text-blue-600">
                    <h3 class="font-semibold">Répartition par Catégorie</h3>
                    <p class="text-lg">
                        
                    <!-- Développement: 45, Design: 35, Data Science: 43 -->

                    <?php
                    foreach ($categorie as $row) {
                        echo  $row['name'].' : ' . $row['number'] . ' , ';
                        }
                    
                    ?>
                
                
                
                </p>
                </div>
                <div class="card bg-yellow-100 text-yellow-600">
                    <h3 class="font-semibold">Top 3 courses</h3>
                    <p class="text-lg">
                    <?php
                    foreach ($courses as $row) {
                        echo  $row['titrecour'].' : ' . $row['number'] . ' , ';
                        }
                    
                    ?>
                    </p>
                </div>
                <!-- <div class="card bg-purple-100 text-purple-600">
                    <h3 class="font-semibold">Top 3 Enseignants</h3>
                    <p class="text-lg">
                     <?php
                    // foreach ($teachers as $row) {
                    //     echo  $row['name'].' : ' . $row['number'] . ' , ';
                    //     }
                    
                    ?> 
                    </p>
                </div> -->
            </div>
        </div>
    </div>

    <script>
    // Initialize Tagify for categories
    const categoriesInput = document.getElementById('categories');
    new Tagify(categoriesInput, {
        whitelist: [], // Optionally predefine tags
        maxTags: 10,   // Limit the number of tags
        dropdown: {
            enabled: 0, // Show dropdown suggestions
        }
    });

    // Initialize Tagify for tags
    const tagsInput = document.getElementById('tags');

    new Tagify(tagsInput, {
        whitelist: [], // Optionally predefine tags
        maxTags: 10,   // Limit the number of tags
        dropdown: {
            enabled: 0, // Show dropdown suggestions
        }
    });


    function getData() {

        console.log(tagsInput.value);
        
        
    }
</script>

</body>
</html>
