<?php

use Core\Application;

use App\Controllers\Frontend\HomeController;
use App\Controllers\Frontend\AuthController;

$router = Application::getInstance()->getRouter();

$router->get('/', [HomeController::class, 'index']);

$router->get('/about', [HomeController::class, 'about']);
$router->get('/cart', [HomeController::class, 'cart']);
$router->get('/shop', [HomeController::class, 'shop']);
$router->get('/wishlist', [HomeController::class, 'wishlist']);
$router->get('/product', [HomeController::class, 'product']);
$router->get('/profile', [HomeController::class, 'profile']);
$router->get('/checkout', [HomeController::class, 'checkout']);
$router->get('/dashboard', [HomeController::class, 'dashboard']);
$router->get('/dashboard/customer', [HomeController::class, 'customerDashboard']);
$router->get('/dashboard/product', [HomeController::class, 'productDashboard']);
$router->get('/dashboard/coupon', [HomeController::class, 'couponDashboard']);
$router->get('/dashboard/slider', [HomeController::class, 'sliderDashboard']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'register']);
