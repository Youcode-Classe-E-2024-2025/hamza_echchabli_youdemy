<?php

namespace Entity;
class Enrollment {
    private $user_id;
    private $course_id;

    public function __construct($user_id, $course_id) {
        $this->user_id = $user_id;
        $this->course_id = $course_id;
    }

    // Getters and Setters
    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getCourseId() {
        return $this->course_id;
    }

    public function setCourseId($course_id) {
        $this->course_id = $course_id;
    }

   
}
?>