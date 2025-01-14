<?php

namespace Controller;

use Model\UserModel;

class AuthController {
    private UserModel $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login(string $email, string $password) {
        $user = $this->userModel->getUserByEmail($email);
              
        if (is_object($user) && $password == $user->getPassword()) { 

            session_start();
            
            $_SESSION['user'] = serialize($user);


            
            return $user;
        
        }

        return null;
    }
    public function handleAuth() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (isset($_POST['login'])) {
                    $email = $_POST['email'] ?? null;
                    $password = $_POST['password'] ?? null;
                    if (!$email || !$password) {
                        $_SESSION['auth_error'] = 'Email and password are required.';
                        header('Location: /auth');
                        exit();
                    }
    
                    $res = $this->login($email, $password);
    
                    if ($res=='wrong') {
                        $_SESSION['auth_error'] = 'the email or password is wrong';
                        header('Location: /auth');
                        exit();
                    }
                    if ($res->getState()==0) {
                        $_SESSION['auth_error'] = 'your account is not comfirmate';
                        header('Location: /auth');
                        exit();
                    }

                    $_SESSION['user'] = serialize($res);
                    header('Location: /Dash');

                    // switch ($res->getRole()) {
                    //     case 'admin':
                    //         header('Location: /adminDash');
                             
                    //         break;
                    //     case 'teacher':
                    //         header('Location: /teacherDash');
                    //         break;

                    //     case 'student':
                    //         header('Location: /studentDash');
                    //         break;
                           
                    //     default:
                    //         header('Location: /auth');
                    //         break;
                    // }

                    
    
                } 
                //elseif (isset($_POST['register'])) {
                //     $username = $_POST['username'] ?? null;
                //     $email = $_POST['email'] ?? null;
                //     $password = $_POST['password'] ?? null;
    
                //     if (!$username || !$email || !$password) {
                //         $_SESSION['auth_error'] = 'All fields are required for registration.';
                //         header('Location: /auth');
                //         exit();
                //     }
    
                //     $res = $this->register([
                //         'username' => $username,
                //         'email' => $email,
                //         'password' => $password
                //     ]);
    
                //     if (!$res['success']) {
                //         $_SESSION['auth_error'] = $res['message'];
                //         header('Location: /auth');
                //         exit();
                //     }

                //     $_SESSION['auth_success'] = 'Registration successful! Please login.';
                //     header('Location: /auth');
                //     exit();
                // }
            }
        } catch (\Exception $e) {
            $_SESSION['auth_error'] = $e->getMessage();
            header('Location: /auth');
            exit();
        }
    }

}
