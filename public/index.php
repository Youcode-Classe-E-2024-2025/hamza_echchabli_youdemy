<?php

use Controller\CourseController;

require_once  '../core/autoloader.php';
require_once '../core/router.php';

session_start();

use core\Router;
use Controller\AuthController;
use Controller\UserController;

// use Controller\CourseController;

   

$router = new Router();

$router->addRoute('GET', '', function() {
    require_once '../views/home.php';
});


$router->addRoute('GET', 'auth', function() {
    require_once '../views/auth.php';
});

$router->addRoute('GET', 'manage', function() {

    $controller = new UserController();

     $controller->manageUsers();
    
}); 

// $router->addRoute('GET', 'details', function() {
//     require_once '../views/coursDetails.php';
// });


$router->addRoute('GET', 'Dash', function() {
    UserController::setRole();

     $controller = new UserController();

     $controller->getDash();

});



// $router->addRoute('GET', 'courses', function() {
//     $controller = new CourseController();

//     $controller->handlecourses();
// });

$router->addRoute('GET', 'courses', function() {
    $controller = new CourseController();

    if (isset($_GET['id'])) {

        $controller->getCourseById($_GET['id']);
    } else {
        // Otherwise, list all courses
        $controller->listCourses($_GET['page']);
    }
});



$router->addRoute('POST', 'handleAuth', function() {
    $controller = new AuthController();

    $controller->handleAuth();
});



$router->dispatch();

?>