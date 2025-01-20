<?php

namespace Entity;

abstract  class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $role;
    private int $state;
    private int $banned;

    public function __construct(int $id, string $name, string $email, string $password, string $role, int $state, int $banned) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->state = $state;
        $this->banned = $banned;
    }

    // Getters
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

    public function getState(): int {
        return $this->state ;
    }

    public function getBanned(): bool {
        return $this->banned ;
    }

    // Check if the email is valid
    public function checkEmail(): bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Compare the given password with the stored password (assuming passwords are hashed)
    

    // Log in: Save user to session
    public function login() {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['user'] = serialize($this);
    }

    // Log out: Destroy session
    public function logout() {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
    }

    // Hash the password (to store it securely)
    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }


}
