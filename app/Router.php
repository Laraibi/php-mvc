<?php

namespace App;

use App\controllers;

class Router
{
    private static $routes = [];

    public static function  addRoute($route, $controller, $action, $method = 'GET')
    {
        self::$routes[$route][$method] = ['controller' => $controller, 'action' => $action];
    }

    public static function render($route)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if (isset(self::$routes[$route])) {
            if (isset(self::$routes[$route][$method])) {
                $controller = self::$routes[$route][$method]['controller'];
                $action = self::$routes[$route][$method]['action'];
                (new $controller())->$action();
            } else {
                header("HTTP/1.1 405 Method not allowed");
                echo "405 Method not allwed";
            }
        } else {
            echo "Route not found";
        }
    }

    public static function get($route, $controller, $action)
    {
        (new self())->addRoute($route, $controller, $action, 'GET');
    }
    public static function post($route, $controller, $action)
    {
        (new self())->addRoute($route, $controller, $action, 'POST');
    }
}
