<?php

namespace Model;

use Config\DB;
use Entity\Admin;
use Entity\Teacher;
use Entity\Student;

use Controller\UserController;

class UserModel {


  private $connection;

    public function __construct() {
        $this->connection = new DB();
    }

    public function create($name, $email, $password, $role) {
        $state = ($role === "teacher") ? 0 : 1;
    
        try {
            // Attempt to insert the user into the database
            DB::query(
                "INSERT INTO users (name, email, password, role, state) 
                 VALUES (:name, :email, :password, :role, :state)",
                [
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $password,
                    ':role' => $role,
                    ':state' => $state
                ]
            );
    
           

            return true;
    
        } catch (\Exception $e) {
            // Check if the exception is due to a duplicate email
            if (str_contains($e->getMessage(), 'duplicate key value violates unique constraint')) {
                return false; // Email already exists
            } else {
                // Re-throw other exceptions for debugging or logging
                throw $e;
            }
        }
    }
    
    public function getUserByEmail(string $email)  {
        $stmt = $this->connection->query("SELECT * FROM users WHERE email = :email" ,['email' => $email]);
        

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        // UserController::setRole($user['role']);


        if ($user) {
            switch ($user['role']) {
                case 'admin':
                    return new Admin($user['id'], $user['name'], $user['email'],$user['password'], $user['state']);
                case 'teacher':
                    return new Teacher($user['id'], $user['name'], $user['email'], $user['password'] ,$user['state']);
                case 'student':
                    return new Student($user['id'], $user['name'], $user['email'], $user['password'],$user['state']);
                default:
                    return null;
            }
        }
        
    }


    public function getValidate() {
        $stmt = $this->connection->query("SELECT * FROM users WHERE state = 1");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Function to get non-validated users (is_valid = 0)
    public function getNonValidate() {
        $stmt = $this->connection->query("SELECT * FROM users WHERE state = 0");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

 //fix this
    // public function top3Teachers() {
    //     $stmt = $this->connection->query("SELECT * FROM users WHERE state = 0");
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }
    public function banUser(int $userId) {
        try {
            $this->connection->query("UPDATE users SET banned = TRUE WHERE id = :id", ['id' => $userId]);
            return "User banned successfully.";
        } catch (\Exception $e) {
            return "Error banning user: " . $e->getMessage();
        }
    }
    
    public function unbanUser(int $userId) {
        try {
            $this->connection->query("UPDATE users SET banned = FALSE WHERE id = :id", ['id' => $userId]);
            return "User unbanned successfully.";
        } catch (\Exception $e) {
            return "Error unbanning user: " . $e->getMessage();
        }
    }
    
    public function validateAccount(int $userId) {
        try {
            $this->connection->query("UPDATE users SET state = 1 WHERE id = :id", ['id' => $userId]);
            return "User account validated successfully.";
        } catch (\Exception $e) {
            return "Error validating account: " . $e->getMessage();
        }
    }
    
    public function suspendUser(int $userId) {
        try {
            $this->connection->query("UPDATE users SET state = 0 WHERE id = :id", ['id' => $userId]);
            return "User account suspended successfully.";
        } catch (\Exception $e) {
            return "Error suspending user: " . $e->getMessage();
        }
    }
    



}
