<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
##Api resource return json file
Route::apiResource("products", \App\Http\Controllers\ProductController::class);
Route::apiResource("shops", \App\Http\Controllers\ShopController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
*/
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/shops', [\App\Http\Controllers\ShopController::class, 'index']);
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);

Route::middleware('api')->get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});


Route::post('/register', [\App\Http\Controllers\AuthenticationController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthenticationController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\AuthenticationController::class, 'logout'])->middleware('auth:sanctum');

/*->withMiddleware(function (Middleware $middleware) {
    $middleware->statefulApi();
});*/

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/user', [AuthenticationController::class, 'user']);
  Route::post('/logout', [AuthenticationController::class, 'logout']);
});




