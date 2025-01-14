<?php

require_once  '../core/autoloader.php';
require_once '../core/router.php';

session_start();

use core\Router;
use Controller\AuthController;

   

$router = new Router();

$router->addRoute('GET', '', function() {
    require_once '../views/home.php';
});


$router->addRoute('GET', 'auth', function() {
    require_once '../views/auth.php';
});

$router->addRoute('GET', 'profile', function() {
    require_once '../views/adminDash.php';
}); // add controller 

$router->addRoute('GET', 'details', function() {
    require_once '../views/coursDetails.php';
});


$router->addRoute('GET', 'Dash', function() {
    
    $res = unserialize($_SESSION['user']);
                    switch ($res->getRole()) {
                        case 'admin':
                            require_once '../views/adminDash.php';
                            // exit(); 
                            break;
                        case 'teacher':
                            require_once '../views/teacherDash.php';
                            
                            break;

                        case 'student':
                            require_once '../views/studentDash.php';
                            break;
                           
                        default:
                            header('Location: /auth');
                            break;
                    }
});



$router->addRoute('GET', 'courses', function() {
    require_once '../views/displayCourses.php';
});


$router->addRoute('POST', 'handleAuth', function() {
    $controller = new AuthController();

    $controller->handleAuth();
});



$router->dispatch();

?>