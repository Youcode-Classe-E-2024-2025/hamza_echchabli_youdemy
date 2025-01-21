<?php

namespace Controller;

use Service\CourseService;
use Repo\EnrollmentRepository;
use Service\EnrollmentService;

class detailsController {





        public function handleRequest() {
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $courseId = $_GET['id'];
                $res = unserialize($_SESSION['user']);
                $type='';

                $course = CourseService::getCourseById($courseId) ;
                $res = EnrollmentRepository::checkOne($courseId ,$res->getId());
                if (str_ends_with($course[0]['contenucour'], '.mp4')) {
                    $type = 'mp4';
                } elseif (str_ends_with($course[0]['contenucour'], '.md')) {
                    $type = 'md';
                } 

                if ($res) {
                    $content=null;
                    if ($course && isset($course[0]['contenucour'])) {
                        // Pass the video URL to the view
                        $content = $course[0]['contenucour'];
                        // echo$course[0]['contenucour'];

                    
                    } else {
                        echo "Video content not found.";
                    }



                    $data =[
                        'course' => $course,
                        'videoPath'=>$content,
                        'type' =>$type,
                        'enroll' => 'enroll'
                    ];

                    $this->view($data);


                   
                }else{
                    $data =[
                        'course' => $course,
                        
                    ];

                    $this->view($data);
                }
    
               
            } else {
                echo 'Invalid course ID.';
            }
        }


   public function manageErollment(){

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $courseId = $_GET['id'];
        $res = unserialize($_SESSION['user']);
        $resut = EnrollmentService::enrollUser($res->getId() ,$courseId);
         

        header('Location: /details?id='.$courseId);
        exit();
        


    }

   }

        private function view(  $data = []) {
            extract($data);
    
            include(__DIR__ . "/../views/coursDetails.php");
        }

















       public function unroll($user_id , $courseId){


        EnrollmentRepository::delete($user_id , $courseId);

        //  echo $user_id . ' '. $courseId ;
        header('Location: /Dash');


         }






    }










  




    ?>
    

















