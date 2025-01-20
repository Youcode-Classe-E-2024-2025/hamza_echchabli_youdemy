<?php

namespace Service;

use Repo\UserRepository;
use Entity\Teacher;
use Entity\Admin;
use Entity\Student;
class UserService {

    
    public static function loginV(string $email, string $password) {
        // Fetch user by email
        $user = UserRepository::getUserByEmail($email);
    
        if (!$user) {
             $_SESSION['auth_error'] = "Email dosn't exist";
            return false;
        }
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if ($user['password']!= $password) {
            $_SESSION['auth_error'] = "wrong password";
            return false;
        }

        if ($user['state']==0){
            $_SESSION['auth_error'] = "your account is not validated yet";
            return false;
        }

        if ($user['banned']==1){
            $_SESSION['auth_error'] = "your account is banned";
            return false;
        }
        
    
        // Determine the user role and create the appropriate instance
        $userEntity = null;
        switch ($user['role']) {
            case 'teacher':
                $userEntity = new Teacher(
                    $user['id'],
                    $user['name'],
                    $user['email'],
                    $user['password'],
                    $user['role'],
                    $user['state'],
                    $user['banned']
                );
                break;
    
            case 'student':
                $userEntity = new Student(
                    $user['id'],
                    $user['name'],
                    $user['email'],
                    $user['password'],
                    $user['role'],
                    $user['state'],
                    $user['banned']
                );
                break;
                case 'admin':
                    $userEntity = new Student(
                        $user['id'],
                        $user['name'],
                        $user['email'],
                        $user['password'],
                        $user['role'],
                        $user['state'],
                        $user['banned']
                    );
                    break;
    
            default:
                return false;
        }
    
        $userEntity->login();
    
        return $userEntity;
    }
    

    // Register Function: Registers a new user and returns success or error message
    public static function registerV(string $name, string $email, string $password, string $role): string {
        // Check if the email already exists
        $existingUser = UserRepository::getUserByEmail($email);
        if ($existingUser['email']) {
            $_SESSION['auth_error'] = "email already exist";
            return false;
        }
    
        // Create the correct User entity based on the role
        $newUser = null;
        switch ($role) {
            case 'teacher':
                $newUser = new Teacher(0, $name, $email, $password, $role , 0 ,0);
                break;
            case 'student':
                $newUser = new Student(0, $name, $email, $password, $role , 1 ,0);
                break;
            default:
                return "Invalid role.";
        }
    
        // Hash the password before storing
        $newUser->hashPassword();
    
        // Save the new user to the database
        $result = UserRepository::createUser(
            $newUser->getName(),
            $newUser->getEmail(),
            $newUser->getPassword(),
            $newUser->getRole(),
            $newUser->getState(),
            $newUser->getBanned()
               
        );
        if (!$result) {
           $_SESSION['auth_error'] = "something went wrong try later";
           return false;
        } else {
            if ($newUser->getRole()=='teacher') {
                $_SESSION['auth_error'] = "your account has been created wait for the admin validation";
                return true ;
            }
            $_SESSION['auth_error'] = "your account has been created you can log in now ";
            return true ;
        }
        
    
       
    }



    public static function getValidatedUsers() {
        return UserRepository::getValidatedUsers();
    }

    public static function getNonValidatedUsers() {
        return UserRepository::getNonValidatedUsers();
    }

    public static function getBannedU() {
        return UserRepository::getBannedUsers();
    }

    

    public static function updateBanned(int $userId): string {
        try {
            UserRepository::updateBanned($userId);
            return true;
        } catch (\Exception $e) {
            return false ; 
        }
    }

    public static function updateState(int $userId): string {
        try {
            UserRepository::updateState($userId);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

   






    
}
?>
