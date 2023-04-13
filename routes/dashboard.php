<?php

use App\Controllers\Frontend\DashboardController;
use Core\Application;

$router = Application::getInstance()->getRouter();

$router->get('/dashboard', [DashboardController::class, 'index']);
$router->get('/dashboard/customer', [HomeController::class, 'customerDashboard']);

$router->get('/dashboard/product', [HomeController::class, 'productDashboard']);
$router->post('/dashboard/product', [HomeController::class, 'editProduct']);


$router->get('/dashboard/coupon', [HomeController::class, 'couponDashboard']);
$router->get('/dashboard/slider', [HomeController::class, 'sliderDashboard']);
$router->get('/dashboard/comment', [HomeController::class, 'commentDashboard']);