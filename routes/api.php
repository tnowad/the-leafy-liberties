<?php
use App\Controllers\Customer\WishlistController;
use Core\Application;

$router = Application::getInstance()->getRouter();

$router->post('/api/wishlist/add', [WishlistController::class, 'add']);