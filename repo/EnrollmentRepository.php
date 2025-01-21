<?php

namespace Repo;

use Config\DB;

class EnrollmentRepository {
    // Add a new enrollment
    public static function add($userId, $courseId) {
        try {
            $query = "INSERT INTO public.enrollment (user_id, course_id) VALUES (:user_id, :course_id)";
            $params = [
                ':user_id' => $userId,
                ':course_id' => $courseId
            ];
            return DB::query($query, $params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function checkOne($courseId, $userId) {
        try {
            $query = "SELECT COUNT(*) AS count FROM public.enrollment WHERE user_id = :userId AND course_id = :courseId";
            $statement = DB::query($query, [
                ':userId' => $userId,
                ':courseId' => $courseId
            ]);

            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return $result['count'] > 0; // Returns true if enrolled, false otherwise
        } catch (\Exception $e) {
            return false;
        }
    }

    // Delete an enrollment
    public static function delete($userId, $courseId) {
        try {
            $query = "DELETE FROM public.enrollment WHERE user_id = :user_id AND course_id = :course_id";
            $params = [
                ':user_id' => $userId,
                ':course_id' => $courseId
            ];
            return DB::query($query, $params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    

    
}
