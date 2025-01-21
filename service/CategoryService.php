<?php

namespace Service;

use Repo\CategoryRepository;

use Entity\Category;

class CategoryService {

    
    public static function insertCategories(array $categories) {
        try {
            // Debugging: Display the categories to ensure correct input
            // var_dump($categories);
            
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
            // Fetch categories from repository
            $categoriesData = CategoryRepository::getAll();

            // Convert the fetched data into Category entity objects
            $categories = [];
            foreach ($categoriesData as $category) {
                $categories[] = new Category($category['name'], $category['id']);
            }

            return $categories;
        } catch (\Exception $e) {
            // Return any error messages
            return "Error: " . $e->getMessage();
        }
    }
}
