<?php

use App\Controllers\Customer\DashboardController;
use App\Controllers\Dashboard\CategoryController;
use App\Controllers\Dashboard\ReviewController;
use App\Controllers\Dashboard\CouponController;
use App\Controllers\Dashboard\OrderController;
use App\Controllers\Dashboard\PermissionController;
use App\Controllers\Dashboard\ProductController;
use App\Controllers\Dashboard\RoleController;
use App\Controllers\Dashboard\SettingController;
use App\Controllers\Dashboard\SlideController;
use App\Controllers\Dashboard\UserController;
use App\Models\Category;
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
$router->post("/dashboard/product", [
  ProductController::class,
  "filterProduct",
]);

//coupon
$router->get("/dashboard/coupon", [CouponController::class, "index"]);
$router->post("/dashboard/coupon", [CouponController::class, "filterCoupon"]);

//coupon function
$router->get("/dashboard/coupon/update", [CouponController::class, "update"]);
$router->post("/dashboard/coupon/update", [CouponController::class, "update"]);
$router->get("/dashboard/coupon/create", [CouponController::class, "create"]);
$router->post("/dashboard/coupon/create", [
  CouponController::class,
  "create",
]);
$router->get("/dashboard/coupon/delete", [CouponController::class, "delete"]);
$router->post("/dashboard/coupon/delete", [
  CouponController::class,
  "delete",
]);


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
$router->get("/dashboard/user", [UserController::class, "index"]);
$router->get("/dashboard/user/show", [UserController::class, "show"]);
$router->get("/dashboard/user/create", [UserController::class, "create"]);
$router->post("/dashboard/user/create", [UserController::class, "create"]);
$router->get("/dashboard/user/update", [UserController::class, "update"]);
$router->post("/dashboard/user/update", [UserController::class, "update"]);
$router->get("/dashboard/user/delete", [UserController::class, "delete"]);
$router->post("/dashboard/user/delete", [UserController::class, "delete"]);

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

// order
$router->get("/dashboard/order", [OrderController::class, "index"]);
$router->get("/dashboard/order/order_review", [OrderController::class, "update"]);
$router->post("/dashboard/order/order_review", [OrderController::class, "update"]);


// categories
$router->get("/dashboard/category", [CategoryController::class, "index"]);
//categories function
$router->get("/dashboard/category/create", [CategoryController::class, "create"]);
$router->post("/dashboard/category/create", [
  CategoryController::class,
  "create",
]);
$router->get("/dashboard/category/update", [CategoryController::class, "update"]);
$router->post("/dashboard/category/update", [
  CategoryController::class,
  "update",
]);
$router->get("/dashboard/category/delete", [CategoryController::class, "delete"]);
$router->post("/dashboard/category/delete", [
  CategoryController::class,
  "delete",
]);


// permission

$router->get("/dashboard/permission", [PermissionController::class, "index"]);
$router->post("/dashboard/permission", [PermissionController::class, "create"]);
$router->post("/dashboard/permission/update", [PermissionController::class, "update"]);
$router->post("/dashboard/permission/delete", [PermissionController::class, "delete"]);

// setting

$router->get("/dashboard/setting", [SettingController::class, "index"]);
$router->post("/dashboard/setting", [SettingController::class, "create"]);
$router->get("/dashboard/setting/update", [SettingController::class, "update"]);
$router->post("/dashboard/setting/update", [SettingController::class, "update"]);
$router->post("/dashboard/setting/delete", [SettingController::class, "delete"]);
