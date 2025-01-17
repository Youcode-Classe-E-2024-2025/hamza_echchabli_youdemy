<?php

namespace Controller;

use Model\CourseModel;
use Model\UserModel;

class UserController {

    private static $userModel;
    private static $courseModel;
    private static string $role;

    public function __construct() {
        // $res = unserialize($_SESSION['user']);
        // self::$role = $res->getRole(); 
        self::$userModel = new UserModel();
        self::$courseModel = new CourseModel();
    }

    public function getDash() {
        if (!isset(self::$role)) {
            throw new \RuntimeException("Role must be set before accessing the dashboard.");
        }

        switch (self::$role) {
            case 'admin':
                $this->adminDashData();
                break;
            // Add other roles as needed
        }
    }

    private function adminDashData() {
        try {
            $NCours = self::$courseModel->getAllCount();
            $top3Categories = self::$courseModel->getTop3Categories();
            $top3courses = self::$courseModel->getTop3Courses();
            $valideAcount= self::$userModel->getValidate();
            $NonValide= self::$userModel->getNonValidate();

            $data = [
                'number' => $NCours,
                'categorie' => $top3Categories,
                'courses' => $top3courses,
                'valide' => $valideAcount,
                'NonValide' => $NonValide

            ];

            $this->AdminDashView($data);
        } catch (\Exception $e) {
            $this->AdminDashView(['message' => $e->getMessage()]);
        }
    }

    private function AdminDashView($data = []) {
        extract($data);
        include(__DIR__ . "/../views/" . self::$role . "Dash.php");
    }

    public static function setRole() {
        $res = unserialize($_SESSION['user']);
        self::$role = $res->getRole(); 
    }


    public function manageUsers(){

        





    }










    // New Methods for Managing Users
    // public function banUser(int $userId) {
    //     try {
    //         $result = self::$userModel->banUser($userId);
    //         echo $result;
    //     } catch (\Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    // public function unbanUser(int $userId) {
    //     try {
    //         $result = self::$userModel->unbanUser($userId);
    //         echo $result;
    //     } catch (\Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    // public function validateAccount(int $userId) {
    //     try {
    //         $result = self::$userModel->validateAccount($userId);
    //         echo $result;
    //     } catch (\Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }

    // public function suspendUser(int $userId) {
    //     try {
    //         $result = self::$userModel->suspendUser($userId);
    //         echo $result;
    //     } catch (\Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }
}
?>