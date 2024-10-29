<?php

use App\Router;
use App\controllers\PersonneController;
use App\Env;

spl_autoload_register(function ($class) {
    $file = $class . ".php";
    include($file);
});


Env::load();
session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

Router::get('addPerson', PersonneController::class, 'create');
Router::post('addPerson', PersonneController::class, 'store');
Router::get('editPerson', PersonneController::class, 'edit');
Router::post('editPerson', PersonneController::class, 'update');
Router::get('deletePerson', PersonneController::class, 'delete');

Router::get('home', PersonneController::class, 'index');

$route = isset($_GET['route']) ? $_GET['route'] : 'home';

Router::render($route);
