<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('home');
});

Route::get('register', [RegistrationController::class, 'showForm'])
    ->name('register');

Route::post('register', [RegistrationController::class, 'validateForm'])
    ->name('register.validate');

Route::get('login', [LoginController::class, 'showForm'])
    ->name('login');

Route::post('login', [LoginController::class, 'login'])
    ->name('login.login');

Route::get('logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('cart', [CartController::class, 'showCart'])
    ->middleware('auth')
    ->name('cart');

Route::post('cart/add/{product}', [CartController::class, 'addToCart'])
    ->middleware('auth')
    ->name('cart.add');