<?php

namespace Model;

use Config\DB;

class CourseModel {
    
    private $connection;

    public function __construct() {
        $this->connection = new DB();
    }

    // Method to create a new course
    public function create($titrecour, $descriptioncour, $contenucour, $user_id, $categorie_id) {
        try {
            // Insert a new course into the 'courses' table
            DB::query(
                "INSERT INTO public.courses (titrecour, descriptioncour, contenucour, user_id, categorie_id) 
                 VALUES (:titrecour, :descriptioncour, :contenucour, :user_id, :categorie_id)",
                [
                    ':titrecour' => $titrecour,
                    ':descriptioncour' => $descriptioncour,
                    ':contenucour' => $contenucour,
                    ':user_id' => $user_id,
                    ':categorie_id' => $categorie_id
                ]
            );
    
            return true; // Return true if insertion was successful
    
        } catch (\Exception $e) {
            // Handle errors like duplicate entry, connection issues, etc.
            return $e->getMessage();
        }
    }

    // Method to get all courses
    public function getAllCourses() {
        try {
            // Retrieve all courses from the 'courses' table
            $statement = DB::query(
                "SELECT * FROM public.courses"
            );

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Method to get courses by category
    public function getById($id) {
        try {
            
            $statement = DB::query(
                "SELECT * FROM public.courses WHERE idcour = :id",
                [':id' => $id]
            );

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    

    // Method to update an existing course
    public function update($id, $titrecour, $descriptioncour, $contenucour, $user_id, $categorie_id) {
        try {
            // Update course details in the 'courses' table
            DB::query(
                "UPDATE public.courses
                 SET titrecour = :titrecour, descriptioncour = :descriptioncour, contenucour = :contenucour, 
                     user_id = :user_id, categorie_id = :categorie_id 
                 WHERE id = :id",
                [
                    ':id' => $id,
                    ':titrecour' => $titrecour,
                    ':descriptioncour' => $descriptioncour,
                    ':contenucour' => $contenucour,
                    ':user_id' => $user_id,
                    ':categorie_id' => $categorie_id
                ]
            );

            return true; // Return true if update was successful
    
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Method to delete a course
    public function delete($id) {
        try {
            // Delete course from the 'courses' table
            DB::query(
                "DELETE FROM public.courses WHERE id = :id",
                [':id' => $id]
            );

            return true; // Return true if deletion was successful

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
