<?php

namespace Service;

use Repo\CategoryRepository;

class CategoryService {

    // Method to mass insert categories
    public static function insertCategories(array $categories) {
        try {
            // Debugging: Display the categories to ensure correct input
            var_dump($categories);
            
            // Call the massInsert method from CategoryRepository
            $result = CategoryRepository::massInsert($categories);

            // Check if result indicates success or failure
            if ($result === true) {
                return "Categories inserted successfully.";
            } else {
                return "Error: " . $result;
            }
        } catch (\Exception $e) {
            // Return any error messages
            return "Error: " . $e->getMessage();
        }
    }

    // Method to get all categories
    public static function getAllCategories() {
        try {
            // Call the getAll method from CategoryRepository
            // $result = CategoryRepository::getAll();

            // Return the fetched categories
            // return $result;  // You may need to return a formatted result, depending on your implementation
        } catch (\Exception $e) {
            // Return any error messages
            return "Error: " . $e->getMessage();
        }
    }
}
