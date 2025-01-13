<?php

require_once  '../core/autoloader.php';
require_once '../core/router.php';

use Config\DB;

use core\Router;
   

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


$router->addRoute('GET', 'details', function() {
    require_once '../views/coursDetails.php';
});


$router->addRoute('GET', 'courses', function() {
    require_once '../views/displayCourses.php';
});





$router->dispatch();

?>