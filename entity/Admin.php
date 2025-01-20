<?php
namespace Entity;
use Entity\User;


class Admin extends User {


    public function __construct($id, $name, $email, $password, $role, $state , $banned ) {
        parent::__construct($id, $name, $email, $password, $role, $state, $banned);
    }

   

    
}



?>