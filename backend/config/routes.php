<?php

use App\Controllers\AlbumsController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\RegisterController;
use App\Kernel\Router\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/register', [RegisterController::class, 'index']),
    Route::post('/register', [RegisterController::class, 'store']),
    Route::get('/login', [AuthController::class, 'index']),
    Route::post('/login', [AuthController::class, 'login']),
    Route::post('/logout', [AuthController::class, 'logout']),
    Route::get('/albums/add', [AlbumsController::class, 'index']),
    Route::post('/albums/add', [AlbumsController::class, 'store']),
];