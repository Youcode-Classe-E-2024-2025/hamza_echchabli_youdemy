<?php

namespace Entity;

class CourseTag {

    private $courseId;
    private $tagId;

    public function __construct($courseId, $tagId) {
        $this->courseId = $courseId;
        $this->tagId = $tagId;
    }

    public function getCourseId() {
        return $this->courseId;
    }

    public function getTagId() {
        return $this->tagId;
    }

   

  
}
?>
