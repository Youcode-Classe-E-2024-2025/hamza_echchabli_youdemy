<?php

namespace Repositories;

use Config\DB;

class TagRepository {
    // Add a new tag
    public function add($name) {
        try {
            $query = "INSERT INTO public.tag (name) VALUES (:name)";
            $params = [':name' => $name];
            return DB::query($query, $params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Get all tags
    public function getAll() {
        try {
            $query = "SELECT * FROM public.tag ORDER BY id ASC";
            $statement = DB::query($query);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
