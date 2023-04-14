<?php

use App\Controllers\Customer\DashboardController;
use App\Controllers\Dashboard\ProductController;
use App\Controllers\Dashboard\UserController;
use Core\Application;

$router = Application::getInstance()->getRouter();

$router->get('/dashboard', [DashboardController::class, 'index']);

$router->get('/dashboard/user', [UserController::class, 'customerDashboard']);

$router->get('/dashboard/product', [ProductController::class, 'index']);
$router->post('/dashboard/product', [ProductController::class, 'editProduct']);


$router->get('/dashboard/coupon', [HomeController::class, 'couponDashboard']);
$router->get('/dashboard/slider', [HomeController::class, 'sliderDashboard']);
$router->get('/dashboard/comment', [HomeController::class, 'commentDashboard']);
