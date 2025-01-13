<?php

namespace Config;
class DB {
     
    private static $connection;

    
    private static function getConnection() {
        
        if (!self::$connection) {
            
            $dsn = 'pgsql:host=localhost;port=5432;dbname=youdemy';
            $username = 'postgres';
            $password = 'hamza';

            try {
                
                self::$connection = new \PDO($dsn, $username, $password, [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]);
            } catch (\PDOException $e) {
                
                throw new \Exception("Database connection failed: " . $e->getMessage());
            }
        }

        
        return self::$connection;
    }

    
    public static function query($query, $params = []) {
        try {
            
            $connection = self::getConnection();

            
            $statement = $connection->prepare($query);
            $statement->execute($params);

            
            return $statement;
        } catch (\PDOException $e) {
            
            throw new \Exception("Query execution failed: " . $e->getMessage());
        }
    }
}










?>