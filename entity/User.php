<?php

namespace Entity;
class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $role;

    private int $state ;

    public function __construct(int $id, string $name, string $email, string $password, string $role ,int $state) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->state = $state;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function getState(): string {
        return $this->state;
    }
    

   

    

   
}
?>




