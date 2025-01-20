<?php

namespace Entity;
class Tag {
    private $id;
    private $name;

    public function __construct($name, $id = null) {
        $this->name = $name;
        $this->id = $id;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }


    public function getName() {
        return $this->name;
    }

}

?>