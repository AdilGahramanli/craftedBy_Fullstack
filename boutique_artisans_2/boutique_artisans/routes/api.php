<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;

// API resource routes for products and shops
Route::apiResource('products', ProductController::class);
Route::apiResource('shops', ShopController::class);

// Fetch CSRF token
Route::middleware('api')->get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});

// Authentication routes
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');

// Order routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/attachProduct', [OrderController::class, 'attachProductToOrderToUser']);
    Route::delete('/orders/{order}/products/{product}', [OrderController::class, 'removeProductFromOrder']);
    Route::get('/orders/{order}/products', [OrderController::class, 'getProductsInOrder']);
});

// Fetch authenticated user info
Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);

// Admin-specific routes
//Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
  //  Route::post('/admin/some-action', [AdminController::class, 'someAction']);
//});

// Artisan-specific routes
//Route::middleware(['auth:sanctum', 'role:artisan'])->group(function () {
//    Route::get('/artisan/store', [ArtisanController::class, 'getStore']);
//});

// User-specific routes
//Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
//    Route::get('/user/cart', [CartController::class, 'getCart']);
//});

// General user info route
Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);
