<?php

use App\Controllers\Customer\DashboardController;
use App\Controllers\Dashboard\ReviewController;
use App\Controllers\Dashboard\CouponController;
use App\Controllers\Dashboard\ProductController;
use App\Controllers\Dashboard\RoleController;
use App\Controllers\Dashboard\SlideController;
use App\Controllers\Dashboard\UserController;
use Core\Application;

$router = Application::getInstance()->getRouter();

$router->get("/dashboard", [DashboardController::class, "index"]);

// product
$router->get("/dashboard/product", [ProductController::class, "index"]);
$router->get("/dashboard/product/show", [ProductController::class, "show"]);
$router->get("/dashboard/product/create", [ProductController::class, "create"]);
$router->post("/dashboard/product/create", [
  ProductController::class,
  "create",
]);
$router->get("/dashboard/product/update", [ProductController::class, "update"]);
$router->post("/dashboard/product/update", [
  ProductController::class,
  "update",
]);
$router->get("/dashboard/product/delete", [ProductController::class, "delete"]);
$router->post("/dashboard/product/delete", [
  ProductController::class,
  "delete",
]);

//product function
$router->get("/dashboard/product/update", [ProductController::class, "update"]);
$router->post("/dashboard/product/update", [
  ProductController::class,
  "update",
]);
$router->get("/dashboard/product/delete", [ProductController::class, "delete"]);
$router->post("/dashboard/product", [
  ProductController::class,
  "filterProduct",
]);

//coupon
$router->get("/dashboard/coupon", [CouponController::class, "index"]);
$router->post("/dashboard/coupon", [CouponController::class, "create"]);
$router->post("/dashboard/coupon", [CouponController::class, "filterCoupon"]);

//coupon function
$router->get("/dashboard/coupon/update", [CouponController::class, "update"]);
$router->post("/dashboard/coupon/update", [CouponController::class, "update"]);

// slide
$router->get("/dashboard/slide", [SlideController::class, "index"]);
$router->get("/dashboard/slide/show", [SlideController::class, "show"]);
$router->get("/dashboard/slide/create", [SlideController::class, "create"]);
$router->post("/dashboard/slide/create", [SlideController::class, "create"]);
$router->get("/dashboard/slide/update", [SlideController::class, "update"]);
$router->post("/dashboard/slide/update", [SlideController::class, "update"]);
$router->get("/dashboard/slide/delete", [SlideController::class, "delete"]);
$router->post("/dashboard/slide/delete", [SlideController::class, "delete"]);

// user
$router->get("/dashboard/customer", [UserController::class, "index"]);
$router->get("/dashboard/customer/show", [UserController::class, "show"]);
$router->get("/dashboard/customer/create", [UserController::class, "create"]);
$router->post("/dashboard/customer/create", [UserController::class, "create"]);
$router->get("/dashboard/customerr/update", [UserController::class, "update"]);
$router->post("/dashboard/customer/update", [UserController::class, "update"]);
$router->get("/dashboard/customer/delete", [UserController::class, "delete"]);
$router->post("/dashboard/customer/delete", [UserController::class, "delete"]);

//role
$router->get("/dashboard/role", [RoleController::class, "index"]);
$router->get("/dashboard/role/show", [RoleController::class, "show"]);
$router->get("/dashboard/role/create", [RoleController::class, "create"]);
$router->post("/dashboard/role/create", [RoleController::class, "create"]);
$router->get("/dashboard/role/update", [RoleController::class, "update"]);
$router->post("/dashboard/role/update", [RoleController::class, "update"]);
$router->get("/dashboard/role/delete", [RoleController::class, "delete"]);
$router->post("/dashboard/role/delete", [RoleController::class, "delete"]);

// reveiw
$router->get("/dashboard/review", [ReviewController::class, "index"]);
