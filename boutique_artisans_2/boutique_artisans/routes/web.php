<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function() {
return view('auth.register');})->name('register');

Route::get('/dashboard', function () {
    return 'Welcome to your dashboard!';
})->middleware(['auth']);

Route::get('/products', function () {
    return view('products', ['name' => 'James']);
});

