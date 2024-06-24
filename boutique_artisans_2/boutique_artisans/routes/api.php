<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


##Api resource return json file
Route::apiResource("products", \App\Http\Controllers\ProduitController::class);
Route::apiResource("shops", \App\Http\Controllers\ShopController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

/*->withMiddleware(function (Middleware $middleware) {
    $middleware->statefulApi();
});*/




