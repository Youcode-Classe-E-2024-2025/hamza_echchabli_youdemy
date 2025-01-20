<?php

namespace Entity;
  use Entity\User;
  class Student extends User {
    private $courses = [];  

    public function __construct($id, $name, $email, $password, $role = 'student', $state = 0, $banned = 0) {
        parent::__construct($id, $name, $email, $password, $role, $state, $banned);
    }

    public function getCourses() {
        return $this->courses;
    }

    public function setCourses($courses) {

      $this->courses=$courses;
 
  }


}
