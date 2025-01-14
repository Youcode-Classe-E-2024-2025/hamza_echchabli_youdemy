<?php

namespace Entity;

  use Entity\User;

  class Admin extends User{

    public function __construct(int $id, string $name, string $email, string $password ,int $state) {
        parent::__construct($id, $name, $email, $password, 'admin' , $state);
    }



  }