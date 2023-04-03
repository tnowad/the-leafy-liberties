<?php

use Core\Application;
use App\Controllers\Frontend\AuthController;
use Core\Router;
use Core\Request;
use Core\Response;

$request = new Request();
$response = new Response($request);
$router = new Router($request, $response);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'postLogin']);
