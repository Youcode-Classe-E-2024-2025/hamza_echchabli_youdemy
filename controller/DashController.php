<?php

namespace Controller;

use Service\CategoryService;
use Service\CourseService;
use Service\UserService;
use Service\TagService;
class DashController {

    private static $userS;
    private static $courseS;

    private static $tagsS;

    private static $categoryS;
    
    private static string $role;

    public function __construct() {

        
        self::$userS = new UserService();
        self::$courseS = new CourseService();
        self::$tagsS = new TagService();
        self::$categoryS = new CategoryService();

    }
    public function manageUsers() {
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $userId = (int) $_GET['id'];
            $action = $_GET['action'];
    
            switch ($action) {
                case 'state':
                    $this->updateAccountState($userId);
                    
                    break;
                
                case 'banned':
                    $this->updateUserB($userId);
                    break;
                default:
                    // Handle invalid action if needed
                    echo "Invalid action!";
                    break;
            }
            header("Location: /Dash"); // Change this to the correct URL for your dashboard
              exit;
        } else {
            // Default view logic if no action is set
            echo "No action specified.";
        }
    }


    public function manageContent() {
        // Log POST data for debugging
       
    
        if (isset($_POST['tagsValues'])) {
            $tags = json_decode($_POST['tagsValues'], true);
            $values=[];
            foreach ($tags as $item) {
                $values[]=  $item['value'] ;
            }
            
            // foreach ($values as $index => $ag) {
            //     echo "(:name{$index})";
            //     echo $index."??" .$ag ."<br>";
            // }
            // echo $values[1];
               $this->addTags($values);
               
               
        } elseif(isset($_POST['categoriesValues'])) {
            $categories = json_decode($_POST['categoriesValues'], true);
            $values=[];
            foreach ($categories as $item) {
                $values[]=  $item['value'] ;
            }
            $this->addCatig($values);
            
          
        }


        header("Location: /Dash"); // Change this to the correct URL for your dashboard
        exit;

    }
    

    public function getDash() {
        
        switch (self::$role) {
            case 'admin':
                $this->adminDashData();
                break;
            case 'teacher':
                $this->teacherDashData();
                break;
            // Add other roles as needed
        }
    }






    private function teacherDashData(){


        $x = [];

        $this->DashView($x);



    }











    private function adminDashData() {
        try {
            $NCours = self::$courseS->getTotalCount();
            $top3Categories = self::$courseS->getTop3Categories();
            $top3courses = self::$courseS->getTop3Courses();
            $valideAcount= self::$userS->getValidatedUsers();
            $NonValide= self::$userS->getNonValidatedUsers();
            $banned= self::$userS->getBannedU();

            $data = [
                'number' => $NCours,
                'categorie' => $top3Categories,
                'courses' => $top3courses,
                'valide' => $valideAcount,
                'NonValide' => $NonValide,
                'banned'=> $banned

            ];

            $this->DashView($data);
        } catch (\Exception $e) {
            $this->DashView(['message' => $e->getMessage()]);
        }
    }

    private function DashView($data = []) {
        extract($data);
        include(__DIR__ . "/../views/" . self::$role . "Dash.php");
    }



    public static function setRole($da) {
        
        self::$role = $da; 
        // var_dump(self::$role);
    }


   









    public function updateUserB(int $userId) {
        try {
            $result = self::$userS->updateBanned($userId);
            echo $result;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateAccountState(int $userId) {
        try {
            $result = self::$userS->updateState($userId);
            echo $result;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function addTags($data){
        
        self::$tagsS->insertTags($data);
    }

    

    public function addCatig($data){
        
        self::$categoryS->insertCategories($data);
    }
    

   
}
?>