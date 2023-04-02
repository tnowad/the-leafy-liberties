<?php
use Core\Route;
use App\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@register');
Route::post('/register', 'AuthController@register');
Route::get('/logout', 'AuthController@logout');
Route::get('/profile', 'ProfileController@index');
Route::get('/profile/edit', 'ProfileController@edit');
Route::post('/profile/update', 'ProfileController@update');
Route::post('/profile/delete', 'ProfileController@delete');
Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts/store', 'PostController@store');
Route::get('/posts/edit', 'PostController@edit');
Route::post('/posts/update', 'PostController@update');
Route::post('/posts/delete', 'PostController@delete');