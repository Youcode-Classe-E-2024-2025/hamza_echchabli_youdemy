<?php

namespace Controller;

use Service\CourseService;

class CoursesController {

    // Method to display all courses
    public function listCourses($page) {
        $N = $page * 6;

        try {
            // Get all courses and count from the CourseService
            $courses = CourseService::getAllCourses($N);
            $count = CourseService::getCount();

            // Return the courses and count (for an API response, you can convert to JSON)
            return $this->view('displayCourses', ['count' => $count], ['courses' => $courses]);
        } catch (\Exception $e) {
            // Handle any potential errors and display a message (you can also log the error)
            return $this->view('error', ['message' => $e->getMessage()]);
        }
    }

    // Method to get a course by ID
    public function getCourseById($id) {
        try {
            // Get a specific course by ID from the CourseService
            $courses = CourseService::getCourseById($id); // Implement `getCourseById` in CourseService if not already done
            
            // Return the course (for an API response, you can convert to JSON)
            return $this->view('coursDetails', ['count' => 0], ['courses' => $courses]);
        } catch (\Exception $e) {
            // Handle any potential errors
            return $this->view('error', ['message' => $e->getMessage()]);
        }
    }

    // Helper method to render views (can be customized to your framework)
    private function view($view, $count, $courses = []) {
        extract($count);
        extract($courses);

        include(__DIR__ . "/../views/" . $view . ".php");
    }
}
