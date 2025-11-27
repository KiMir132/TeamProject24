<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('home');
});

Route::get('register', [RegistrationController::class, 'showForm'])
    ->name('register');

Route::post('register', [RegistrationController::class, 'validateForm'])
    ->name('register.validate');

Route::get('login', [LoginController::class, 'showForm'])
    ->name('login');

Route::post('login', [LoginController::class, 'login'])->name('login.login');