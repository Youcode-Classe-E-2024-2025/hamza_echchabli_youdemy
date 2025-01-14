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
        return 'wrong';
    }
}
