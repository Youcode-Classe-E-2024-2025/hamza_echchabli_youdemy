<?php
namespace Entity;
use Entity\User;

class Teacher extends User {
    private $courses = [];  

    public function __construct($id, $name, $email, $password, $role, $state , $banned ) {
        parent::__construct($id, $name, $email, $password, $role, $state, $banned);
    }

    public function getCourses() {
        return $this->courses;
    }

    public function setCourses($courses) {

         $this->courses=$courses;
    
    }
    

    
}



?>