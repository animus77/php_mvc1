<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\UserController;
use Controllers\SellController;

$router = new Router();

// generamos un array asociativo, que despues tiene un array indexado, 
// dentro del objeto Router 
$router->get('/', [UserController::class, 'index']);
$router->get('/admin', [UserController::class, 'admin']);

$router->get('/sell', [SellController::class, 'index']);


$router->routes_test();