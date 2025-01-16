<?php
namespace Controller;

use Model\CourseModel;
use Model\UserModel;

class UserController {

    private $userModel;
    private $courseModel;
    public  static string $role;

    public function __construct(){

        $this->userModel = new UserModel();

        $this->courseModel = new CourseModel();

         

    }


    public  function getDash(){

        switch(self::$role){
            case 'admin' :
               
        
            


        }


        if(self::$role=='admin'){
            $this->adminDashData();

        }

    }



    private function adminDashData(){

        try {

            $NCours = $this->courseModel->getAllCount();
            $top3Categories = $this->courseModel->getTop3Categories();

            $top3courses = $this->courseModel->getTop3Courses();

            $data = ['number' => $NCours , 'categorie'=> $top3Categories , 'courses' =>$top3courses];

            $this->AdminDashView('data', $data);

        }catch (\Exception $e) {
            $this->AdminDashView('error', ['message' => $e->getMessage()]);
        }




    }

   
    
    
   



     
    private function AdminDashView($view, $data = [] ) {
        extract($data);
      
        include(__DIR__ . "/../views/".self::$role."Dash.php");
    }








}

?>