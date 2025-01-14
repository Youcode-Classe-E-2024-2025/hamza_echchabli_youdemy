<?php

namespace Entity;
  use Entity\User;

  class Student extends User{

    public function __construct(int $id, string $name, string $email, string $password ,int $state) {

        parent::__construct($id, $name, $email, $password, 'student' , $state);

    }

    

  }