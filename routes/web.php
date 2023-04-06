<?php
use Core\Application;

use App\Controllers\Frontend\HomeController;
use App\Controllers\Frontend\AuthController;

$router = Application::getInstance()->getRouter();

$router->get('/', [HomeController::class, 'index']);

$router->get('/about', [HomeController::class, 'about']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);