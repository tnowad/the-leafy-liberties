<?php

use Core\Application;

use App\Controllers\Customer\HomeController;
use App\Controllers\Customer\AuthController;
use App\Controllers\Customer\ProductController;
use App\Controllers\Customer\WishlistController;
use App\Controllers\Customer\CartController;
use App\Controllers\Customer\ProfileController;

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

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);