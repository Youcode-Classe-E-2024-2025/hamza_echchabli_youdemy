<?php

namespace Repositories;

use Config\DB;

class CourseRepository {
    // Retrieve all courses with pagination
    public function getAllCourses($N) {
        try {
            $statement = DB::query(
                "SELECT * FROM public.courses ORDER BY idcour ASC LIMIT :limitN OFFSET :offset",
                [':limitN' => 6, ':offset' => $N]
            );
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Get total pages (assuming 6 courses per page)
    public function getCount() {
        try {
            $statement = DB::query("SELECT CEIL(COUNT(*) / 6.0) AS count FROM public.courses;");
            return $statement->fetch();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Get total number of courses
    public function getAllCount() {
        try {
            $statement = DB::query("SELECT COUNT(*) AS count FROM public.courses;");
            return $statement->fetch();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Get top 3 categories based on course count
    public function getTop3Categories() {
        try {
            $sql = "SELECT c.name, COUNT(*) AS number
                    FROM categorie c
                    JOIN courses co ON co.categorie_id = c.id
                    GROUP BY c.name
                    ORDER BY number DESC
                    LIMIT 3";

            $statement = DB::query($sql);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Error Processing Request: " . $e->getMessage());
        }
    }

    // Get top 3 courses based on enrollment count
    public function getTop3Courses() {
        try {
            $sql = "SELECT c.titrecour, COUNT(*) AS number
                    FROM courses c
                    JOIN enrollment e ON e.course_id = c.idcour
                    GROUP BY c.titrecour
                    ORDER BY number DESC
                    LIMIT 3";

            $statement = DB::query($sql);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception("Error Processing Request: " . $e->getMessage());
        }
    }

    // Get courses by ID
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
}
