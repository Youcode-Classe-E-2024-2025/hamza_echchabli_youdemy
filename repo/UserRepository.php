<?php

namespace App\Repositories;

use Config\DB;

class UserRepository {

    // Get a user by ID
    public static function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $params = ['id' => $id];
        return DB::fetch($query, $params);
    }

    // Get all users
    public static function getAllUsers() {
        $query = "SELECT * FROM users";
        return DB::fetch($query);
    }

    // Get invalid users (state=0, banned=0)
    public static function getInvalidUsers() {
        $query = "SELECT * FROM users WHERE state = 0 AND banned = 0";
        return DB::fetch($query);
    }

    // Get valid users (state=1, banned=0)
    public static function getValidUsers() {
        $query = "SELECT * FROM users WHERE state = 1 AND banned = 0";
        return DB::fetch($query);
    }

    // Get banned users (banned=1)
    public static function getBannedUsers() {
        $query = "SELECT * FROM users WHERE banned = 1";
        return DB::fetch($query);
    }

    // Update user details
    public static function updateUser($id, $name, $email, $password, $role) {
        $query = "UPDATE users SET name = :name, email = :email, password = :password, role = :role WHERE id = :id";
        $params = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role
        ];
        return DB::query($query, $params);
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
}

?>
