<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegistrationController::class, 'showForm'])
    ->name('register');

Route::get('register', [RegistrationController::class, 'validateForm'])
    ->name('register.validate');