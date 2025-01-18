<?php

namespace Repositories;

use Config\DB;

class CategorieRepository {
    // Add a new category
    public function add($name) {
        try {
            $query = "INSERT INTO public.categorie (name) VALUES (:name)";
            $params = [':name' => $name];
            return DB::query($query, $params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Get all categories
    public function getAll() {
        try {
            $query = "SELECT * FROM public.categorie ORDER BY id ASC";
            $statement = DB::query($query);
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
