<?php

namespace Repositories;

use Config\DB;

class EnrollmentRepository {
    // Add a new enrollment
    public function add($userId, $courseId) {
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

    // Delete an enrollment
    public function delete($userId, $courseId) {
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
