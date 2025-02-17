<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Browse Courses</title>
    <link rel="stylesheet" href="../css/output.css">
    <style>
        /* Sticky Header Container */
.sticky-header {
    position: sticky; /* Sticky behavior */
    top: 0px;
  
    background-color: white; /* Match the background */
    border-bottom: 1px solid #e2e8f0; /* Border for the sticky header */
    z-index: 40; /* Below the navbar */
    padding: 1rem;
    margin: 0 auto;
    max-width: 1280px; /* Example max width */
    display: flex;
    justify-content: center;
    gap: 1rem;
}
.sticky-parent {
    position: relative; /* Ensures sticky child works */
}

/* Responsive Flexbox */
.sticky-header .flex-container {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: center;
    justify-content: space-between;
}

/* Select Dropdown */
.select {
    min-width: 160px;
    padding: 0.5rem 1rem; /* 2 * 4px = 8px, 4 * 4px = 16px */
    background-color: white;
    border: 1px solid #e2e8f0; /* slate-300 */
    border-radius: 0.5rem; /* rounded-lg */
    outline: none;
    transition: box-shadow 0.2s;
}

.bgBlach{
    width: fit-content;
    margin: auto;
    margin-top: 30px;
    margin-bottom: 30px;
}

.select:focus {
    box-shadow: 0 0 0 2px #64748b; /* slate-500 focus ring */
}

/* Search Input Container */
.search-container {
    position: relative;
    max-width: 320px; /* md:max-w-xs */
    flex: 1;
}

/* Search Input */
.search-container input {
    width: 100%;
    padding: 0.5rem 2.5rem 0.5rem 1rem; /* pl-4 pr-10 py-2 */
    border: 1px solid #e2e8f0; /* slate-300 */
    border-radius: 0.5rem; /* rounded-lg */
    outline: none;
    transition: box-shadow 0.2s;
}

.search-container input:focus {
    box-shadow: 0 0 0 2px #64748b; /* slate-500 focus ring */
}

/* Search Icon */
.search-container svg {
    position: absolute;
    right: 0.75rem; /* 3 * 4px = 12px */
    top: 50%;
    transform: translateY(-50%);
    width: 1.25rem; /* 5 * 4px = 20px */
    height: 1.25rem;
    color: #94a3b8; /* slate-400 */
}

    </style>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="text-2xl font-bold text-slate-800"><a href="/">Youdemy</a></div>
                <div class="hidden md:flex items-center space-x-8">
                    <!-- <a href="#" class="text-slate-600 hover:text-slate-900">Home</a> -->
                    <!-- <a href="#" class="text-slate-600 hover:text-slate-900">Teach</a>
                    <a href="#" class="text-slate-600 hover:text-slate-900">Enterprise</a> -->
                </div>
                <div class="flex items-center gap-4">
                <?php
                if (isset($_SESSION['user'])) {
                   echo ' <a href="handleAuth" class="text-slate-600 hover:text-slate-900">Sign Out</a>';
                } else {
                   echo ' <a href="auth" class="text-slate-600 hover:text-slate-900">Sign In</a>'; 
                }
                
                   

                    ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow  sticky-parent">
        <!-- Page Header -->
        

        <div class="sticky-header">
            <!-- <div class="flex-container">
                <div class="flex gap-4">
                    <select class="select">
                        <option value="">All Categories</option>
                        <option value="development">Development</option>
                        <option value="design">Design</option>
                        <option value="business">Business</option>
                        <option value="marketing">Marketing</option>
                    </select>
                    <select class="select" style="min-width: 140px;">
                        <option value="">Sort by</option>
                        <option value="popularity">Popularity</option>
                        <option value="rating">Rating</option>
                        <option value="newest">Newest</option>
                    </select>
                </div> -->
                <!-- <div class="search-container">
                    <input type="text" placeholder="Search courses..." />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div> -->
            
                <form class="search-container" action="/courses" method="GET">
    <input type="text" name="name" placeholder="Search courses..." aria-label="Search courses" />
    <button type="submit" aria-label="Search">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>
</form>


            </div>
        </div>
        

        <!-- Courses Grid -->
        <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto px-4 py-8">
    <div id="courseContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
   
    <?php foreach ($courses as $course): ?>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-bold mb-4"><?= htmlspecialchars($course['titrecour']) ?></h3>
        
        <div class="flex flex-wrap gap-2 mb-4">
        <?php 
    // Check if tags are null or empty
    if (empty($course['tags'])) {
        echo '<span class="text-gray-400 text-sm">No tags exist</span>';
    } else {
        // If tags are available, explode the string into an array
        $tags = explode(', ', $course['tags']);
        foreach ($tags as $tag): ?>
            <span class="bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full"><?= htmlspecialchars($tag) ?></span>
        <?php endforeach;
    }
?>
        </div>

        <div class="bg-gray-100 text-gray-700 text-sm px-4 py-2 rounded mb-4">
            Category: <?= htmlspecialchars($course['categorie']) ?>
        </div>

        <div class="bg-gray-100 text-gray-700 text-sm px-4 py-2 rounded mb-4">
            Description: <?= htmlspecialchars($course['descriptioncour']) ?>
        </div>

        <div class="flex justify-between items-center mb-4">
            <div class="bg-green-100 text-green-600 text-sm px-4 py-2 rounded">Students: <?= htmlspecialchars($course['students'] ?? 'N/A') ?></div>
            <div class="bg-yellow-100 text-yellow-600 text-sm px-4 py-2 rounded">Views: <?= htmlspecialchars($course['views'] ?? 'N/A') ?></div>
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
           <a href="/details?id=<?= htmlspecialchars($course['idcour']) ?>">View Details</a> 
        </button>
    </div>
<?php endforeach; ?>

    </div>
</div>

        </div>

        <?php
 $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        ?>

        <!-- Pagination -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="m-auto flex justify-evenly items-center gap-2 bgBlach">
                <a  href="?page=<?=$current_page-1?>" class="px-4 py-2 border border-slate-300 rounded-lg hover:bg-slate-50 disabled:opacity-50 disabled:cursor-not-allowed" >
                    Previous
        </a>
        <?php
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Check if $count['count'] exists and is greater than 0
    if (isset($count['count']) && $count['count'] > 0) {
        for ($i = 0; $i <= $count['count'] - 1; $i++) {
            if ($i === $current_page) {
                // Highlight the current page button
                echo '<button class="px-4 py-2 bg-slate-800 text-white rounded-lg">' . $i . '</button>';
            } else {
                // Regular button with a link to the page
                echo '<a href="?page=' . $i . '" class="px-4 py-2 border border-slate-300 rounded-lg hover:bg-slate-50">' . $i . '</a>';
            }
        }
    } else {
        echo '<p class="text-gray-500">No pages available</p>';
    }
?>

                <a  href="?page=<?=$current_page+1?>" class="px-4 py-2 border border-slate-300 rounded-lg hover:bg-slate-50 disabled:opacity-50 disabled:cursor-not-allowed" >
                    Next
        </a>
            </div>

            <?php
  


//             for ($i = 1; $i <= $count['count']; $i++) {
//     if ($i === $current_page) {
//         // Highlight the current page button
//         echo '<button class="px-4 py-2 bg-slate-800 text-white rounded-lg">' . $i . '</button>';
//     } else {
//         // Regular button with a link to the page
//         echo '<button onclick="window.location.href=\'?page=' . $i . '\'" class="px-4 py-2 border border-slate-300 rounded-lg hover:bg-slate-50">' . $i . '</button>';
//     }
// }


?>
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