<?php

namespace Service;

use Repo\CourseRepository;

class CourseService {

    // Method to get all courses with pagination
    public static function getAllCourses($N) {
        return CourseRepository::getAllCourses($N);
    }
    // getById

    public static function getCourseById($id) {
        return CourseRepository::getById($id);
    }

    // Method to get paginated course count
    public static function getCount() {
        return CourseRepository::getCount();
    }

    // Method to get total course count
    public static function getTotalCount() {
        return CourseRepository::getAllCount();
    }

    // Method to get top 3 categories
    public static function getTop3Categories() {
        return CourseRepository::getTop3Categories();
    }

    // Method to get top 3 courses by enrollment
    public static function getTop3Courses() {
        return CourseRepository::getTop3Courses();
    }

    public static function get6Courses($N) {
        return CourseRepository::getAllCourses($N);
    }
}
