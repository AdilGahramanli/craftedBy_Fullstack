<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/shops', [\App\Http\Controllers\ShopController::class, 'index']);

/*Route::get('/products', function () {
    return view('products', ['name' => 'James']);
});*/
