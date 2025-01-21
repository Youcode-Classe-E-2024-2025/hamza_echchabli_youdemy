<?php

namespace Controller;

use Service\CategoryService;
use Service\CourseService;
use Service\UserService;
use Service\TagService;
use Service\Course_tagService;
class DashController {

    private static $userS;
    private static $courseS;

    private static $tagsS;
    private static $cousTagS;
    private static $categoryS;

   
    
    private static string $role;

    public function __construct() {

        
        self::$userS = new UserService();
        self::$courseS = new CourseService();
        self::$tagsS = new TagService();
        self::$categoryS = new CategoryService();
        self::$cousTagS =new Course_tagService();

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
            case 'student':
                $this->studentDashData();
                break;
            // Add other roles as needed
        }
    }




  

    


    private function studentDashData(){
        try{
            $res = unserialize($_SESSION['user']);
         $courses=self::$courseS->getStudentCourseById($res->getId());
         
        
         $data = [
     
             'courses' =>$courses,
        
         ];
 
         $this->DashView($data);
     } catch (\Exception $e) {
         $this->DashView(['message' => $e->getMessage()]);
     }
 
 
 
     }
 
 

    public function manageCourses()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["REQUEST_METHOD"] == "POST") {
        
       
            $action = $_POST['action'];
            
            switch ($action) {
                case 'add':
                    $this->addCourse();
                    break;
                
                case 'delete':
                    // Future update course method
                    $this->deleteCours($_POST['id']);
                    break;
                
                default:
                    echo "Invalid action!";
                    exit;
            }
            
            header("Location: /Dash"); // Redirect to the dashboard after processing
            exit;
        }
   
}

// public function addCourse()
// {
//     try {
//         // Sanitize and collect form data
//         $titrecour = $_POST['course-title']; 
//         $categorie_id = 2;
//         $descriptioncour = $_POST['course-description'];
//         // $tags = explode(',', filter_input(INPUT_POST, 'course-tags', FILTER_SANITIZE_STRING));

//         // Handle file upload
//         if (isset($_FILES['course-content']) && $_FILES['course-content']['error'] === UPLOAD_ERR_OK) {
//             $uploadDir = '../uploads/courses/';
//             $fileName = uniqid() . "_" . basename($_FILES['course-content']['name']);
//             $contenucour = $uploadDir . $fileName;

//             if (!is_dir($uploadDir)) {
//                 mkdir($uploadDir, 0777, true);
//             }

//             if (move_uploaded_file($_FILES['course-content']['tmp_name'], $contenucour)) {

//                 $user = $user = unserialize($_SESSION['user']); 
                
//                 $user_id= $user->getId();

//                 $courseId = self::$courseS::createCourse($titrecour, $descriptioncour, $contenucour, $user_id, $categorie_id);
                
//                 echo $courseId->fetch();
//                 // if ($courseId) {
//                 //     // Insert tags into the database
//                 //     $tagValues = array_map('trim', $tags);
//                 //     Repo\TagRepository::massInsert($tagValues);

//                 //     echo "Course added successfully!";
//                 // } else {
//                 //     echo "Failed to add course.";
//                 // }
//             }  
//             } else if (isset($_POST['md']) && !empty(trim($_POST['md']))) {
//                 // Handling text-based course content (TinyMCE content)
//                 $contenucour = trim($_POST['md']);  // Retrieve TinyMCE content safely
            
//                 $user = unserialize($_SESSION['user']); 
//                 $user_id = $user->getId();
            
//                 // Save course with text content
//                 $courseId = self::$courseS::createCourse($titrecour, $descriptioncour, $contenucour, $user_id, $categorie_id);
                
//                 echo $courseId->fetch();
//             } else {
//                 echo "Invalid file upload or content submission.";
//             }
        
//     } catch (\Exception $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }

  
public function addCourse()
{
    try {
        // Sanitize and collect form data
        $titrecour = $_POST['course-title']; 
        $categorie_id = $_POST['course-category'];
        $descriptioncour = $_POST['course-description'];
        $tags = $_POST['course-tags'];

        // Directory to store course files
        $uploadDir = '../public/uploads/courses/';

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Handle file uploads (video or document)
        if (isset($_FILES['course-content']) && $_FILES['course-content']['error'] === UPLOAD_ERR_OK) {
            $fileName = uniqid() . "_" . basename($_FILES['course-content']['name']);
            $contenucour = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['course-content']['tmp_name'], $contenucour)) {
                $user = unserialize($_SESSION['user']); 
                $user_id = $user->getId();

                // Save course with uploaded file (video or document)
                $courseId = self::$courseS::createCourse($titrecour, $descriptioncour, $contenucour, $user_id, $categorie_id);
                self::$cousTagS::insertCourseTags($courseId->fetchColumn() , $tags) ;
                // echo $courseId->fetchColumn();
            } else {
                echo "File upload failed.";
            }

        } else if (isset($_POST['md']) && !empty(trim($_POST['md']))) {
            // Handling text-based course content (TinyMCE content)
            $content = trim($_POST['md']);
            $fileName = uniqid() . "_content.md";  // Save as Markdown or .txt file
            $filePath = $uploadDir . $fileName;

            // Save content to a file
            if (file_put_contents($filePath, $content)) {
                $user = unserialize($_SESSION['user']); 
                $user_id = $user->getId();

                // Save course with reference to the saved text file
                $courseId = self::$courseS::createCourse($titrecour, $descriptioncour, $filePath, $user_id, $categorie_id);
                self::$cousTagS::insertCourseTags($courseId->fetchColumn() , $tags) ;
                // echo $courseId;
            } else {
                echo "Failed to save text content.";
            }

        } else {
            echo "Invalid file upload or content submission.";
        }

    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}



  public function deleteCours($id){
    self::$courseS->deletecour($id);
  } 



    private function teacherDashData(){
       try{
        $catego= self::$categoryS->getAllCategories();
        $tag=self::$tagsS->getAllTags();
        $res = unserialize($_SESSION['user']);
        $courses=self::$courseS->getCoursesByUserId($res->getId());
        $countStat =  self::$courseS->getCoursesCount($res->getId());
        $CategorieC =  self::$courseS->getUserCategoriesC($res->getId());
        $data = [
            
            'categories' => $catego,
            'tags' => $tag,
            'courses' =>$courses,
            'coursesCount' =>$countStat ,
            'CategorieC' => $CategorieC


        ];

        $this->DashView($data);
    } catch (\Exception $e) {
        $this->DashView(['message' => $e->getMessage()]);
    }



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