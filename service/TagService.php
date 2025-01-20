<?php

namespace Service;

use Repo\TagRepository;

class TagService {

    // Method to mass insert tags
    public static function insertTags(array $tags) {
        try {
            var_dump($tags);
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

    public static function getAllTags(){

 try {
            // Call the massInsert method from TagRepository
            $result = TagRepository::getAll();

            
          
            return "Tags inserted successfully.";
           
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    
    }
}
