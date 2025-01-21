<?php

namespace Controller;

use Service\CourseService;
use Repo\EnrollmentRepository;

class detailsController {



        public function handleRequest() {
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $courseId = $_GET['id'];
                $res = unserialize($_SESSION['user']);

                $course = CourseService::getCourseById($courseId) ;
                $res = EnrollmentRepository::checkOne($courseId ,$res->getRole());
                if ($res) {
                   
                }
    
               
            } else {
                echo 'Invalid course ID.';
            }
        }




        private function view($view,  $courses = []) {
            extract($courses);
    
            include(__DIR__ . "/../views/" . $view . ".php");
        }






















    }
















    ?>
    

















