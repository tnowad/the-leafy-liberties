<?php
use App\Controllers\Customer\WishlistController;
use Core\Application;

$router = Application::getInstance()->getRouter();

$router->post("/api/wishlist/add", [WishlistController::class, "add"]);
$router->post("/api/wishlist/remove", [WishlistController::class, "remove"]);
$router->post("/api/wishlist/empty", [WishlistController::class, "empty"]);
$router->post("/api/wishlist/add-to-cart", [WishlistController::class, "addToCart"]);
$router->post("/api/wishlist/move-all-to-cart", [WishlistController::class, "moveAllToCart"]);