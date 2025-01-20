<?php

use Controller\AuthControllerr;
use Controller\CoursesController;

require_once  '../core/autoloader.php';
require_once '../core/router.php';

session_start();

use core\Router;
use Controller\AuthController;
use Controller\DashController;

// use Controller\CourseController;

   

$router = new Router();

$router->addRoute('GET', '', function() {
    require_once '../views/home.php';
});


$router->addRoute('GET', 'auth', function() {
    require_once '../views/auth.php';
});

$router->addRoute('GET', 'manage', function() {

    $controller = new DashController();

     $controller->manageUsers();
    
}); 
$router->addRoute('GET', 'manageContent', function() {

    $controller = new DashController();

     $controller->manageContent();
    
}); 
$router->addRoute('POST', 'manageCourses', function() {

    $controller = new DashController();

     $controller->manageCourses();
    
}); 


// manageCourses

// $router->addRoute('GET', 'details', function() {
//     require_once '../views/coursDetails.php';
// });


$router->addRoute('GET', 'Dash', function() {
    

     $controller = new DashController();
     $res = unserialize($_SESSION['user']);
     
    DashController::setRole($res->getRole());
     $controller->getDash();

});



// $router->addRoute('GET', 'courses', function() {
//     $controller = new CourseController();

//     $controller->handlecourses();
// });

$router->addRoute('GET', 'courses', function() {
    $controller = new CoursesController();

    if (isset($_GET['id'])) {

        $controller->getCourseById($_GET['id']);
    } else {
        // Otherwise, list all courses
        $controller->listCourses($_GET['page']);
    }
});



$router->addRoute('POST', 'handleAuth', function() {
    $controller = new AuthControllerr();

    $controller->handleAuth();
});



$router->dispatch();

?>