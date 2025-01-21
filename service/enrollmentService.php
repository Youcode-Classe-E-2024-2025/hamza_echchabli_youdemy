<?php

namespace Service;

use Repo\EnrollmentRepository;

class EnrollmentService {
    
    // Enroll a user in a course
    public static function enrollUser($userId, $courseId) {
        if (EnrollmentRepository::checkOne($courseId, $userId)) {
            return false;
        }

        $result = EnrollmentRepository::add($userId, $courseId);

        if ($result) {
            return false;
        } else {
            return true;
        }
    }

    // Unenroll a user from a course
    public static function unenrollUser($userId, $courseId) {
        if (!EnrollmentRepository::checkOne($courseId, $userId)) {
            return false;
        }

        $result = EnrollmentRepository::delete($userId, $courseId);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Check if a user is enrolled in a course
    public static function isUserEnrolled($userId, $courseId) {
        return EnrollmentRepository::checkOne($courseId, $userId);
    }
}
