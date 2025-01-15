<?php 

namespace Entity;

abstract class Course {
    private int $id;
    private string $name;
    private string $description;
    private string $content;   
    protected array $tags;
    protected string $category;
    public function __construct(int $id ,string $title, string $description, string $content, array $tags, string $category) {
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->tags = $tags;
        $this->category = $category;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getContent(): string {
        return $this->content;
    }

    // Setters
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }




}

      

?>