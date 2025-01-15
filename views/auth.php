<?php

if (isset($_SESSION['user'])) {
 header('Location: /');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/" class="text-2xl font-bold  text-slate-800">Youdemy</a>
            </div>
        </div>
    </nav>

    <!-- Auth Container -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md">
            <?php       
              if (isset($_SESSION['auth_error'])) {

                echo "<div class='m-auto text-center w-full'>".$_SESSION['auth_error']."</div>";
              
            } 
                                                      
                 
            ?>
           
            <div class="flex border-b">
                <button onclick="switchTab('login')" id="loginTab" 
                        class="w-1/2 py-4 px-6 text-center border-b-2 border-indigo-600 text-indigo-600 font-medium">
                    Login
                </button>
                <button onclick="switchTab('register')" id="registerTab"
                        class="w-1/2 py-4 px-6 text-center border-b-2 border-transparent text-gray-500 font-medium">
                    Register
                </button>
            </div>

            
            <div id="loginForm" class="p-8">
                <h1 class="">test</h1>
                <form class="space-y-6" action="handleAuth" method="POST">
                    <div>
                        <input type="login" name="login" >
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input type="email" id="email" name="email" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="flex items-center justify-between">
                      

                        <div class="text-sm">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Forgot password?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sign in
                        </button>
                    </div>

                   
                </form>
            </div>

            <!-- Register Form -->
            <div id="registerForm" class="p-8 hidden">
            <form class="space-y-6" action="handleAuth" method="POST">
    <div>
        <label class="block text-sm font-medium text-gray-700">I want to:</label>
        <div class="mt-2 space-x-4">
            <input type="text" name="register" value="register" class="hidden">
            <label class="inline-flex items-center">
                <input type="radio" name="role" value="student" checked class="form-radio text-indigo-600">
                <span class="ml-2">Learn</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="role" value="teacher" class="form-radio text-indigo-600">
                <span class="ml-2">Teach</span>
            </label>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">User Name</label>
            <input type="text" name="username" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Email address</label>
        <input type="email" name="email" required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" name="confirm_password" required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <button type="submit"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create Account
        </button>
    </div>
</form>

            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');

            if (tab === 'login') {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
                loginTab.classList.add('border-indigo-600', 'text-indigo-600');
                loginTab.classList.remove('border-transparent', 'text-gray-500');
                registerTab.classList.remove('border-indigo-600', 'text-indigo-600');
                registerTab.classList.add('border-transparent', 'text-gray-500');
            } else {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
                registerTab.classList.add('border-indigo-600', 'text-indigo-600');
                registerTab.classList.remove('border-transparent', 'text-gray-500');
                loginTab.classList.remove('border-indigo-600', 'text-indigo-600');
                loginTab.classList.add('border-transparent', 'text-gray-500');
            }
        }
    </script>
</body>
</html>