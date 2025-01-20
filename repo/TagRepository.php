<?php

namespace Repo;

use Config\DB;

class TagRepository {
   
    public static function create($name) {
        try {
            $query = "INSERT INTO public.tag (name) VALUES (:name)";
            $params = [':name' => $name];
            return DB::query($query, $params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public static function massInsert(array $tags) {
        try {
            if (empty($tags)) {
                return "No tags provided for insertion.";
            }
            

            $values = [];
            $params = [];
            
            foreach ($tags as $index => $tag) {
                $values[] = "(:name{$index})";
                $params[":name{$index}"] = $tag;
            }
            
            $query = "INSERT INTO public.tag (name) 
                      VALUES " . implode(", ", $values) . "
                      ON CONFLICT (name) DO NOTHING RETURNING id";
                 
             DB::query($query, $params);
            
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Get all tags
    public static function getAll() {
        try {
            $query = "SELECT * FROM public.tag ORDER BY id ASC";
            $statement = DB::query($query);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
