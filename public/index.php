<?php
// public/index.php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\UserController;

$router = new Router();

// Home routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [HomeController::class, 'about']);

// User routes
$router->get('/users', [UserController::class, 'list']);
$router->get('/users/{id}', [UserController::class, 'show']);

$router->get('/contact', [HomeController::class, 'contact']);

echo $router->resolve();