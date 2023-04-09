<?php

use Core\Application;
use App\Controllers\backend\SeederController;

$router = Application::getInstance()->getRouter();

$router->get('/seeder', [SeederController::class, 'index']);
$router->get('/seeder/run', [SeederController::class, 'run']);