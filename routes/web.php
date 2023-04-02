<?php
use Core\Route;
use App\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/products/{id}', [HomeController::class, 'product']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/register', [HomeController::class, 'register']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/resources/{resource}', [ResourceController::class, 'resource']);