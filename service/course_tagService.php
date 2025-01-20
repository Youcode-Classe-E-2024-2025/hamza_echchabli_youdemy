<?php

namespace Service;

use Repo\CourseTagRepository;

class Course_tagService {

    // Function to insert course tags
    public static function insertCourseTags($courseId, $tags) {
        try {
            // Split the comma-separated tag IDs string into an array
            $tagIds = explode(',', $tags);

            // Trim any spaces and filter out empty values
            $tagIds = array_filter(array_map('trim', $tagIds));

            // Ensure there are valid tag IDs
            if (empty($tagIds)) {
                throw new \Exception("No valid tags provided.");
            }

        //    var_dump($tagIds);
            // echo $tagIds[0];
            // Call massInsert to insert the tags for the course
             return CourseTagRepository::massInsert($courseId, $tagIds);
            
        } catch (\Exception $e) {
            // Handle any exceptions
            echo "Error: " . $e->getMessage();
        }
    }
}

?>
