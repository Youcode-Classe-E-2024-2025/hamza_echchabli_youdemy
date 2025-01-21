<?php

namespace Repo;

use Config\DB;

class CategoryRepository {
    // Add a new category
    public static function massInsert(array $categories) {
        try {
            // Check if the categories array is empty
            if (empty($categories)) {
                return "No categories provided for insertion.";
            }

            // Prepare the query parameters
            $values = [];
            $params = [];
            
            // Loop through the categories and create placeholders for each category
            foreach ($categories as $index => $category) {
                $values[] = "(:name{$index})";
                $params[":name{$index}"] = $category;
            }
            
            // Build the query to insert multiple categories
            $query = "INSERT INTO public.categorie (name) 
                      VALUES " . implode(", ", $values) . "
                      ON CONFLICT (name) DO NOTHING RETURNING id";
            
            // Execute the query
        DB::query($query, $params);
            
            

        } catch (\Exception $e) {
            // Catch any exceptions and return the error message
            return $e->getMessage();
        }
    }

    // Get all categories
    public static function getAll() {
        try {
            $query = "SELECT * FROM public.categorie ORDER BY id ASC";
            $statement = DB::query($query);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
