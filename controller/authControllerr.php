<?php

namespace Controller;

use Controller\DashController;

use Service\UserService;

class AuthControllerr {
    private UserService $userS;

    public function __construct() {
        $this->userS = new UserService();
    }

    public function register($name, $email, $password, $role){

        $res=$this->userS->registerV($name, $email, $password, $role);
        return $res;

    }

    public function login(string $email, string $password) {
        $user = $this->userS->loginV($email ,$password);
              
        if ($user==false) { 

          return null;
          
        }

        return $user;
    }
    public function handleAuth()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['login'])) {
                    $email = $_POST['email'] ?? null;
                    $password = $_POST['password'] ?? null;
                    $_SESSION['check'] = $email .'vcd'.$password;
                    if (!$email || !$password) {
                        $_SESSION['auth_error'] = 'Email and password are required.';
                        header('Location: /auth');
                        exit();
                    }
    
                    $res = $this->login($email, $password);
                    // var_dump($res);
    
                   if($res ==  false){
                    header('Location: /auth');
                    exit();
                   }


                  
         
                
                    $_SESSION['user'] = serialize($res);
                    header('Location: /');
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
                        
                        header('Location: /auth');
                        exit();
                    }
    
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
