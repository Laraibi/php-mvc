<?php

namespace App;

class Env
{

    private static $path = ".env";
    private static $variables = [];

    /**
     * Load environment variables from .env file.
     */
    public static function load()
    {
        if (!file_exists(self::$path)) {
            throw new \Exception(".env file not found at path: " . self::$path);
        }

        $lines = file(self::$path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            // Ignore comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            // Split the line into key and value
            [$key, $value] = explode('=', $line, 2);

            // Remove any surrounding quotes and whitespace
            $key = trim($key);
            $value = trim($value);

            // Store the variable in the static array
            self::$variables[$key] = $value;

            // Set it in the PHP environment (optional)
            putenv("$key=$value");
        }
    }

    /**
     * Get an environment variable by key, with optional default.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        return self::$variables[$key] ?? $default;
    }
}
