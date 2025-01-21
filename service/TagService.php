<?php

namespace Service;

use Repo\TagRepository;

class TagService {

    // Method to mass insert tags
    public static function insertTags(array $tags) {
        try {
            // var_dump($tags);
            $result = TagRepository::massInsert($tags);

            // Check if result indicates success or failure
            if ($result === true) {
                return "Tags inserted successfully.";
            } else {
                return "Error: " . $result;
            }
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public static function getAllTags() {
        try {
            // Fetch tags from the TagRepository
            $tagsData = TagRepository::getAll();
    
            // Convert the fetched data into Tag entity objects
            $tags = [];
            foreach ($tagsData as $tag) {
                $tags[] = new \Entity\Tag($tag['name'], $tag['id']);
            }
    
            return $tags;  // Return an array of Tag objects
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
}
