<?php

namespace Model;

use Config\DB;
use Entity\Admin;
use Entity\Teacher;
use Entity\Student;

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
    
            // Return true if the insertion was successful
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
}
