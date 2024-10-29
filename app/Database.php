<?php

namespace App;

use PDO;
use PDOException;
use App\Env;

class Database
{

    private static $instance = null;

    // Make the constructor private to prevent direct instantiation
    private function __construct()
    {
        // Empty constructor to enforce singleton behavior
    }

    public static function getConnection()
    {
        if (self::$instance === null) {
            $dbHost = Env::get("DB_HOST");
            $dbUser = Env::get("DB_USER");
            $dbPassword = Env::get("DB_PASS");
            $dbName = Env::get("DB_NAME");
            try {
                self::$instance = new PDO(
                    "mysql:host=" . $dbHost . ";dbname=" . $dbName,
                    $dbUser,
                    $dbPassword,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                // Log the exception message and handle errors appropriately
                die("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$instance;
    }

    // Prevent cloning
    private function __clone() {}

    // Prevent unserialization
    public  function __wakeup() {}
}
