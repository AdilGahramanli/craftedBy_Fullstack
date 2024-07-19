<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

// API resource routes for products and shops
Route::apiResource('products', ProductController::class);
Route::apiResource('shops', ShopController::class);

// Fetch CSRF token
Route::middleware('api')->get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});

// Authentication routes
//Route::post('/register', [AuthenticationController::class, 'register']);
//Route::post('/login', [AuthenticationController::class, 'login']);
//Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/orders', [OrderController::class, 'store']);

// Fetch authenticated user info
Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);
Route::middleware('auth:sanctum')->post('/attachProduct', [OrderController::class, 'attachProductToOrderToUser']);

// Admin-specific routes
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::post('/admin/some-action', [AdminController::class, 'someAction']);
});

// Artisan-specific routes
Route::middleware(['auth:sanctum', 'role:artisan'])->group(function () {
    Route::get('/artisan/store', [ArtisanController::class, 'getStore']);
});

// User-specific routes
Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
    Route::get('/user/cart', [CartController::class, 'getCart']);
});

// General user info route
Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);










// <?php
//
// use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
//
// /*
// ##Api resource return json file
// Route::apiResource("products", \App\Http\Controllers\ProductController::class);
// Route::apiResource("shops", \App\Http\Controllers\ShopController::class);
//
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
//
// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);
//
//     return ['token' => $token->plainTextToken];
// });
// */
// Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
// Route::get('/shops', [\App\Http\Controllers\ShopController::class, 'index']);
// Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
//
//
// Route::middleware('api')->get('/csrf-token', function () {
// return 'toto';
//     return response()->json(['csrfToken' => csrf_token()]);
// });
//
//
// Route::post('/register', [\App\Http\Controllers\AuthenticationController::class, 'register']);
// Route::post('/login', [\App\Http\Controllers\AuthenticationController::class, 'login']);
// Route::post('/logout', [\App\Http\Controllers\AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
//
// /*->withMiddleware(function (Middleware $middleware) {
//     $middleware->statefulApi();
// });*/
//
// Route::middleware('auth:sanctum')->group(function () {
//   Route::get('/user', [AuthenticationController::class, 'user']);
//   Route::post('/logout', [AuthenticationController::class, 'logout']);
// });
//
// Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
//     Route::post('/admin/some-action', [AdminController::class, 'someAction']);
// });
//
// Route::middleware(['auth:sanctum', 'role:artisan'])->group(function () {
//     Route::get('/artisan/store', [ArtisanController::class, 'getStore']);
// });
//
// Route::middleware(['auth:sanctum', 'role:user'])->group(function () {
//     Route::get('/user/cart', [CartController::class, 'getCart']);
// });
//
// Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);
//
//
//
//
