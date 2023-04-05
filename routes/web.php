<?php
use Core\Application;

use App\Controllers\Frontend\HomeController;

$router = Application::getInstance()->getRouter();

$router->get('/', [HomeController::class, 'index']);

$router->get('/about', [HomeController::class, 'about']);