<?php

use App\Controllers\Customer\DashboardController;
use App\Controllers\Customer\HomeController;
use App\Controllers\Dashboard\CouponController;
use App\Controllers\Dashboard\ProductController;
use App\Controllers\Dashboard\SlideController;
use App\Controllers\Dashboard\UserController;
use Core\Application;

$router = Application::getInstance()->getRouter();

$router->get('/dashboard', [DashboardController::class, 'index']);

$router->get('/dashboard/user', [UserController::class, 'customerDashboard']);

//product
$router->get('/dashboard/product', [ProductController::class, 'index']);
$router->post('/dashboard/product', [ProductController::class, 'create']);
$router->post('/dashboard/product', [ProductController::class, 'filterProduct']);



//product function
$router->get('/dashboard/product/update', [ProductController::class, 'update']);
$router->post('/dashboard/product/update', [ProductController::class, 'update']);
$router->get('/dashboard/product/delete', [ProductController::class, 'delete']);

//coupon
$router->get('/dashboard/coupon', [CouponController::class, 'index']);
$router->post('/dashboard/coupon', [CouponController::class, 'create']);
$router->post('/dashboard/coupon', [CouponController::class, 'filterCoupon']);

//coupon function
$router->get('/dashboard/coupon/update', [CouponController::class, 'update']);
$router->post('/dashboard/coupon/update', [CouponController::class, 'update']);


// slide
$router->get('/dashboard/slide', [SlideController::class, 'index']);
$router->post('/dashboard/slide/create', [SlideController::class, 'create']);
$router->get('/dashboard/slide/update', [SlideController::class, 'update']);

$router->get('/dashboard/comment', [HomeController::class, 'commentDashboard']);

//User
$router->get('/dashboard/customer', [UserController::class, 'index']);

//user function
$router->get('/dashboard/user/update', [UserController::class, 'update']);
$router->post('/dashboard/user/update', [UserController::class, 'update']);
