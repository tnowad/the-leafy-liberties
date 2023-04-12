<?php

use Core\Application;

use App\Controllers\Frontend\HomeController;
use App\Controllers\Frontend\AuthController;
use App\Controllers\Frontend\ProductController;
use App\Controllers\Frontend\WishlistController;
use App\Controllers\Frontend\CartController;
use App\Controllers\Frontend\ProfileController;

$router = Application::getInstance()->getRouter();

$router->get('/', [HomeController::class, 'index']);

$router->get('/about', [HomeController::class, 'about']);
$router->get('/shop', [HomeController::class, 'shop']);
$router->get('/cart', [CartController::class, 'index']);
$router->get('/wishlist', [WishlistController::class, 'index']);
$router->get('/products', [ProductController::class, 'index']);
$router->get('/product', [ProductController::class, 'show']);
$router->get('/products/filter', [ProductController::class, 'filter']);

$router->get('/profile', [ProfileController::class, 'index']);
$router->post('/profile', [ProfileController::class, 'update']);

$router->get('/checkout', [HomeController::class, 'checkout']);
$router->get('/dashboard', [HomeController::class, 'dashboard']);
$router->get('/dashboard/customer', [HomeController::class, 'customerDashboard']);
$router->get('/dashboard/product', [HomeController::class, 'productDashboard']);
$router->get('/dashboard/coupon', [HomeController::class, 'couponDashboard']);
$router->get('/dashboard/slider', [HomeController::class, 'sliderDashboard']);
$router->get('/dashboard/comment', [HomeController::class, 'commentDashboard']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);