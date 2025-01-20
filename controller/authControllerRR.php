<?php

namespace Controller;

use Model\UserModel;

class AuthController {
    private UserModel $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register($name, $email, $password, $role){

        $res=$this->userModel->create($name, $email, $password, $role);
        return $res;

    }

    public function login(string $email, string $password) {
        $user = $this->userModel->getUserByEmail($email);
              
        if (is_object($user) && $password == $user->getPassword()) { 

          return $user;
          
        }

        return null;
    }
    public function handleAuth()
    {
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
    
                    if ($res === null) {
                        $_SESSION['auth_error'] = 'The email or password is wrong.';
                        header('Location: /auth');
                        exit();
                    }
                 
    
                    if ($res->getState() == 0) { 
                        $_SESSION['test1']= $res->getState();
                        $_SESSION['auth_error'] = 'Your account is not confirmed.';
                        header('Location: /auth');
                        exit();                    
                    }
    
                    $_SESSION['user'] = serialize($res);
                    header('Location: /Dash');
                    exit();
                } elseif (isset($_POST['register'])) {
                    $name = $_POST['username'] ?? null;
                    $email = $_POST['email'] ?? null;
                    $password = $_POST['password'] ?? null;
                    $confirm_password = $_POST['confirm_password'] ?? null;
                    $role = $_POST['role'] ?? null;
    
                    if (!$name || !$email || !$password || !$role) {
                        $_SESSION['auth_error'] = 'All fields are required for registration.';
                        header('Location: /auth');
                        exit();
                    }
    
                    if ($password !== $confirm_password) {
                        $_SESSION['auth_error'] = 'Passwords do not match.';
                        header('Location: /auth');
                        exit();
                    }
    
                    $res = $this->register($name, $email, $password, $role);

                   
    
                    if (!$res) {
                        $_SESSION['auth_error'] = 'This email already exists.';
                        header('Location: /auth');
                        exit();
                    }
    
                    $_SESSION['auth_success'] = 'Registration successful! Please login.';
                    header('Location: /auth');
                    exit();
                }
            } else {
                session_unset();
                session_destroy();
                header('Location: /');
                exit();
            }
        } catch (\Exception $e) {
            $_SESSION['auth_error'] = $e->getMessage();
            // header('Location: /');
            exit();
        }
    }
    
}
