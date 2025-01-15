<?php

namespace Controller;

use Model\CourseModel;

class CourseController {

    private $courseModel;

    public function __construct() {
        // Initialize the CourseModel
        $this->courseModel = new CourseModel();
    }

    // Method to display all courses
    public function listCourses() {
        try {
            // Get all courses from the CourseModel
            $courses = $this->courseModel->getAllCourses();
            
            // Return the courses (for an API response, you can convert to JSON)
            return $this->view( 'displayCourses',['courses' => $courses]); // Assuming you are using a view rendering system
            
        } catch (\Exception $e) {
            // Handle any potential errors and display a message (you can also log the error)
            return $this->view('error', ['message' => $e->getMessage()]);
        }
    }

    // Optionally: Method to get courses by category
    public function  getCourseById($Id) {
        try {
            // Get courses by category from the CourseModel
            $courses = $this->courseModel->getById($Id);
            
            // Return the courses (for an API response, you can convert to JSON)
            return $this->view( 'details',['courses' => $courses]);

        } catch (\Exception $e) {
            return $this->view('error', ['message' => $e->getMessage()]);
        }
    }

    

    // You can add more methods if needed for other functionalities like course details, updating, or deleting courses

    // Simple helper to render views (can be customized to your framework)
    private function view($view , $courses = []) {
        // Assuming you're using a view system, you can pass data to the view
        extract($courses); // Extract variables from data to be available in the view
        include(__DIR__ . "/../views/".$view.".php");
    }

    
}
