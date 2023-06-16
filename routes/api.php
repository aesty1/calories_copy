<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\CalorieController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
// Получение целевой даты
Route::get('/target-date', [RegistrationController::class, 'targetDate']);

// Получение рецепта по названию из всех рецептов
Route::get('/recipes', [RecipeController::class, 'findRecipes']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', [UserController::class, 'show']);

    Route::get('/user/products', [UserController::class, 'showProduct']);
    Route::post('/user/products', [UserController::class, 'storeProduct']);
    Route::delete('/user/products/{id}', [UserController::class, 'deleteProduct']);

    Route::get('/user/history', [UserController::class, 'showHistory']);
    Route::post('/user/history', [UserController::class, 'storeHistory']);
    Route::post('/user/history/water', [UserController::class, 'storeWater']);
    Route::post('/user/history/workout', [UserController::class, 'storeWorkout']);

    Route::get('/products', [ProductController::class, 'show']);
});
