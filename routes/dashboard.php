<?php

use App\Controllers\Customer\DashboardController;
use App\Controllers\Customer\HomeController;
use App\Controllers\Dashboard\ProductController;
use App\Controllers\Dashboard\SlideController;
use App\Controllers\Dashboard\UserController;
use Core\Application;

$router = Application::getInstance()->getRouter();

$router->get('/dashboard', [DashboardController::class, 'index']);

$router->get('/dashboard/user', [UserController::class, 'customerDashboard']);

$router->get('/dashboard/product', [ProductController::class, 'index']);
$router->post('/dashboard/product', [ProductController::class, 'create']);


$router->get('/dashboard/product/update', [ProductController::class, 'update']);
$router->post('/dashboard/product/update', [ProductController::class, 'update']);

$router->get('/dashboard/coupon', [HomeController::class, 'couponDashboard']);

// slide
$router->get('/dashboard/slide', [SlideController::class, 'index']);
$router->post('/dashboard/slide/create', [SlideController::class, 'create']);
$router->get('/dashboard/slide/update', [SlideController::class, 'update']);

$router->get('/dashboard/comment', [HomeController::class, 'commentDashboard']);
$router->get('/dashboard/customer', [HomeController::class, 'customerDashboard']);