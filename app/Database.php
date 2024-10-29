<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    private static $dbHost = "localhost";
    private static $dbUser = "root";
    private static $dbPassword = "";
    private static $dbName = "mvc";
    private static $instance = null;

    // Make the constructor private to prevent direct instantiation
    private function __construct()
    {
        // Empty constructor to enforce singleton behavior
    }

    public static function getConnection()
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,
                    self::$dbUser,
                    self::$dbPassword,
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
    private function __wakeup() {}
}
