<?php

namespace Repo;

use Config\DB;
// use Entity\CourseTag;

class CourseTagRepository {

    // public static function createCourseTag(CourseTag $courseTag) {
    //     $query = "INSERT INTO course_tag (course_id, tag_id) VALUES (:course_id, :tag_id)";
    //     $params = [
    //         'course_id' => $courseTag->getCourseId(),
    //         'tag_id' => $courseTag->getTagId()
    //     ];
    //     return DB::query($query, $params);
    // }

    public static function massInsert($courseId, array $courseTags) {
        try {
            // Prepare the base query for inserting multiple records
            $query = "INSERT INTO course_tag (course_id, tag_id) VALUES ";
            
            // Prepare an array to hold the value placeholders
            $valuePlaceholders = [];
            $params = [];
            
            // Loop through each tag ID and create value placeholders and parameters
            foreach ($courseTags as $index => $tagId) {
                $valuePlaceholders[] = "(:course_id_{$index}, :tag_id_{$index})";
                $params["course_id_{$index}"] = $courseId;
                $params["tag_id_{$index}"] = $tagId;
            }
            
            // Combine the value placeholders into the query
            $query .= implode(", ", $valuePlaceholders);
            // echo $query ;
            // echo '<br>';
            // var_dump($params);


            $result = DB::query($query, $params);
            
            
            
        } catch (\Exception $e) {
            // Log the exception or handle as needed
            return "Error: " . $e->getMessage();
        }
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
        return DB::query($query, $params);
    }
}
?>
