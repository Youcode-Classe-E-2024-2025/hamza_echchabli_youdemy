<?php

namespace Repo;

use Config\DB;

class CourseRepository {

    public static function create($titrecour, $descriptioncour, $contenucour, $user_id, $categorie_id) {
        try {
            $res =DB::query(
                "INSERT INTO public.courses (titrecour, descriptioncour, contenucour, user_id, categorie_id) 
                 VALUES (:titrecour, :descriptioncour, :contenucour, :user_id, :categorie_id) RETURNING idcour",
                [
                    ':titrecour' => $titrecour,
                    ':descriptioncour' => $descriptioncour,
                    ':contenucour' => $contenucour,
                    ':user_id' => $user_id,
                    ':categorie_id' => $categorie_id
                ]
            );
    
            return $res; // Return true if insertion was successful
    
        } catch (\Exception $e) {
            return $e->getMessage(); // Return error message
        }
    }

    
    
    // Method to get all courses with pagination
    public static function getAllCourses($N) {
        try {
            $statement = DB::query(
                "SELECT 
                    co.idcour, 
                    co.titrecour, 
                    co.descriptioncour, 
                    co.details, 
                    cat.name AS categorie, 
                    STRING_AGG(t.name, ', ') AS tags
                FROM public.courses co
                JOIN public.categorie cat ON co.categorie_id = cat.id
                LEFT JOIN public.course_tag ct ON co.idcour = ct.course_id
                LEFT JOIN public.tag t ON ct.tag_id = t.id
               
                GROUP BY co.idcour, co.titrecour, co.descriptioncour, co.details, categorie 
                 ORDER BY co.idcour ASC
                LIMIT :limitN OFFSET :offset
                ;",
                [':limitN' => 6, ':offset' => $N]
            );

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public static function getByName($name) {
        try {
            $sql = "SELECT 
                        co.idcour, 
                        co.titrecour, 
                        co.descriptioncour, 
                        co.details, 
                        cat.name AS categorie, 
                        STRING_AGG(t.name, ', ') AS tags
                    FROM public.courses co
                    JOIN public.categorie cat ON co.categorie_id = cat.id
                    LEFT JOIN public.course_tag ct ON co.idcour = ct.course_id
                    LEFT JOIN public.tag t ON ct.tag_id = t.id
                    WHERE co.titrecour ILIKE :name || '%'
                    GROUP BY co.idcour, co.titrecour, co.descriptioncour, co.details, cat.name";
    
            $statement = DB::query($sql, [':name' => $name]);
    
           return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getById($id) {
        try {
            $statement = DB::query(
                
                "SELECT 
    co.idcour, 
    co.titrecour, 
    co.descriptioncour, 
    co.contenucour, 
    co.details, 
    cat.name AS categorie, 
    u.name AS creator, 
    STRING_AGG(Distinct t.name, ',') AS tags,
    COUNT(*) AS number -- Counting the number of users enrolled in the course
FROM public.courses co
JOIN public.categorie cat ON co.categorie_id = cat.id
JOIN public.users u ON co.user_id = u.id
LEFT JOIN public.course_tag ct ON co.idcour = ct.course_id
LEFT JOIN public.tag t ON ct.tag_id = t.id
LEFT JOIN public.enrollment en ON co.idcour = en.course_id -- Assuming `enrollment` is the table linking users to courses
WHERE co.idcour = :id
GROUP BY co.idcour, co.titrecour, co.descriptioncour,co.contenucour, co.details, cat.name, u.name

                
                ",
                [':id' => $id]
            );

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    

    // Method to get paginated course count
    public static function getCount() {
        try {
            $statement = DB::query("SELECT CEIL(COUNT(*) / 6.0) AS count FROM public.courses;");

            return $statement->fetch();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Method to get total course count
    public static function getAllCount() {
        try {
            $statement = DB::query("SELECT COUNT(*) AS count FROM public.courses;");

            return $statement->fetch();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public static function getCourseCountByUserId($id) {
        try {
            $statement = DB::query("SELECT COUNT(*) AS count FROM public.courses where user_id = :id ;" , [':id' => $id]);

            return $statement->fetch();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getUserCategories($id) {
        try {
            $sql = "SELECT c.name, COUNT(*) AS number
                    FROM categorie c
                    JOIN courses co ON co.categorie_id = c.id
                     WHERE co.user_id = :id
                    GROUP BY c.name
                    ORDER BY number DESC
                    ";
    
            $statement = DB::query($sql, [':id' => $id]);

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }




    // Method to get top 3 categories
    public static function getTop3Categories() {
        try {
            $sql = "SELECT c.name, COUNT(*) AS number
                    FROM categorie c
                    JOIN courses co ON co.categorie_id = c.id
                    GROUP BY c.name
                    ORDER BY number DESC
                    LIMIT 3";
    
            $statement = DB::query($sql);

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    // Method to get top 3 courses by enrollment
    public static function getTop3Courses() {
        try {
            $sql = "SELECT c.titrecour, COUNT(*) AS number
                    FROM courses c
                    JOIN enrollment e ON e.course_id = c.idcour
                    GROUP BY c.titrecour
                    ORDER BY number DESC
                    LIMIT 3";
    
            $statement = DB::query($sql);

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    // Method to get a course by ID
    // public static function getById($id) {
    //     try {
    //         $statement = DB::query(
    //             "SELECT * FROM public.courses WHERE idcour = :id",
    //             [':id' => $id]
    //         );

    //         return $statement->fetchAll(\PDO::FETCH_ASSOC);
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public static function getByUserId($id) {
        try {
            $statement = DB::query(
                "SELECT 
                    courses.idcour, 
                    courses.titrecour, 
                    courses.descriptioncour, 
                    courses.contenucour, 
                    users.name AS user_name, 
                    categorie.name AS categorie_name
                FROM public.courses
                INNER JOIN public.users ON courses.user_id = users.id
                INNER JOIN public.categorie ON courses.categorie_id = categorie.id
                WHERE courses.user_id = :id",
                [':id' => $id]
            );
    
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    

    // Method to update an existing course
    public static function update($id, $titrecour, $descriptioncour, $contenucour, $user_id, $categorie_id) {
        try {
            DB::query(
                "UPDATE public.courses
                 SET titrecour = :titrecour, descriptioncour = :descriptioncour, contenucour = :contenucour, 
                     user_id = :user_id, categorie_id = :categorie_id 
                 WHERE idcour = :id",
                [
                    ':id' => $id,
                    ':titrecour' => $titrecour,
                    ':descriptioncour' => $descriptioncour,
                    ':contenucour' => $contenucour,
                    ':user_id' => $user_id,
                    ':categorie_id' => $categorie_id
                ]
            );

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Method to delete a course
    public static function delete($id) {
        try {
            DB::query(
                "DELETE FROM public.courses WHERE idcour = :id",
                [':id' => $id]
            );

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
