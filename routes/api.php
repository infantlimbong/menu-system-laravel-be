<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::post('/login', [LoginController::class, 'login']);
Route::get('/list-categories', [ListController::class, 'category_index']);
Route::get('/list-menus', [ListController::class, 'menu_index']);
Route::get('/list-best_selling', [ListController::class, 'best_selling_index']);



Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategoryController::class);
    Route::get('/categories/{category}/menus/count', [CategoryController::class, 'menusCount']);

    Route::apiResource('menus', MenuController::class);
    Route::post('/edit_image/{menu}', [MenuController::class, 'editImage']);

    // Route::apiResource('products', ProductController::class);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::get('/user', [UserController::class, 'authenticatedUser']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
    Route::post('/logout', [LoginController::class, 'logout']);
});
