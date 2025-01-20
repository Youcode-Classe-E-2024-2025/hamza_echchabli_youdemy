<?php 

namespace Entity;
class Course {
    private $id;
    private $title;
    private $description;
    private $content;
    private $teacherId;
    private $categoryId;
    private $tags;
    private $details;

    public function __construct(int $id ,string $title, string $description, string $content, int $teacherId, int $categoryId, array $tags, string $details) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->teacherId = $teacherId;
        $this->categoryId = $categoryId;
        $this->tags = $tags;
        $this->details = $details;
    }

    // Getter methods for each property
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getContent() { return $this->content; }
    public function getTeacherId() { return $this->teacherId; }
    public function getCategoryId() { return $this->categoryId; }
    public function getTags() { return $this->tags; }
    public function getDetails() { return $this->details; }


    
    public function setCategoryId($categoryId) { return $this->categoryId=$categoryId; }

    
    public function setContent($content) { return $this->content=$content; }

    public function setTags($tags) { $this->tags=$tags; }
}
