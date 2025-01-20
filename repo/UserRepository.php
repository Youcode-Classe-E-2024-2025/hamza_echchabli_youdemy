<?php

namespace Repo;

use Config\DB;

class UserRepository {

    

    public static function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $params = ['email' => $email];
        $res = DB::query($query, $params);

        return $res->fetch();
    }

    // Get all users
   
    

    // Update user details
    public static function createUser($name, $email, $password, $role , $state , $banned) {
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, email, password, role , state , banned) VALUES (:name, :email, :password, :role , :state , :banned)  RETURNING  id";
        $params = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role ,
            'state' => $state ,
            'banned' =>0
        ];
         $res = DB::query($query, $params);
        if (!$res) {
           return false ;
        } else {
           return $res->fetch();
        }
        
       
        
    }
    

    public static function updateState($id) {
        $query = "UPDATE users 
                  SET state = CASE WHEN state = 0 THEN 1 ELSE 0 END 
                  WHERE id = :id";
        $params = ['id' => $id];
        return DB::query($query, $params);
    }
    
    public static function updateBanned($id) {
        $query = "UPDATE users 
                  SET banned = CASE WHEN banned = 0 THEN 1 ELSE 0 END 
                  WHERE id = :id";
        $params = ['id' => $id];
        return DB::query($query, $params);
    }
    

    // Delete user
    public static function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $params = ['id' => $id];
        return DB::query($query, $params);
    }

    public static function getValidatedUsers() {
        $query = "SELECT * FROM users WHERE state = 1 AND banned = 0";
      
        $res = DB::query($query);

        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getNonValidatedUsers() {
        $query = "SELECT * FROM users WHERE state = 0 ";
       
        $res = DB::query($query);

        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    public static function getBannedUsers() {
        $query = "SELECT * FROM users WHERE  banned = 1";
       
        $res = DB::query($query);

        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }

   

}

?>
