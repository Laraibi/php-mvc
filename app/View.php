<?php

namespace App;

class View
{
    public static function render($view, $data = [])
    {
        extract($data);
        $view = str_replace('.', "/", $view);
        require_once("Views/{$view}.php");
        require_once('Views/layout.php');
    }
}
