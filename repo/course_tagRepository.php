<?php

namespace Repo;

use Config\DB;
use Entity\CourseTag;

class CourseTagRepository {

    public static function createCourseTag(CourseTag $courseTag) {
        $query = "INSERT INTO course_tag (course_id, tag_id) VALUES (:course_id, :tag_id)";
        $params = [
            'course_id' => $courseTag->getCourseId(),
            'tag_id' => $courseTag->getTagId()
        ];
        return DB::query($query, $params);
    }

    // Get all tags by course ID
    public static function getTagsByCourseId($courseId) {
        $query = "
            SELECT t.* 
            FROM tags t
            JOIN course_tag ct ON t.id = ct.tag_id
            WHERE ct.course_id = :course_id
        ";
        $params = ['course_id' => $courseId];
        return DB::fetch($query, $params);
    }
}
?>
