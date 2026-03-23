<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    $products      = Product::orderBy('Price', 'desc')->take(8)->get();
    $categories    = collect(['CPU', 'RAM', 'Case', 'Monitor']);
    $totalProducts = Product::count();
    return view('home', compact('products', 'categories', 'totalProducts'));
});

Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');

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

Route::delete('cart/remove/{product}', [CartController::class, 'removeFromCart'])
    ->name('cart.remove')
    ->middleware('auth');

Route::get('checkout', [CartController::class, 'showForm'])
    ->name('checkout.form')
    ->middleware('auth');

Route::post('checkout', [CartController::class, 'checkout'])
    ->name('checkout.process')
    ->middleware('auth');

Route::patch('cart/increase/{product}', [CartController::class, 'increase'])
    ->name('cart.increase')
    ->middleware('auth');

Route::patch('cart/decrease/{product}', [CartController::class, 'decrease'])
    ->name('cart.decrease')
    ->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/search', [ProductController::class, 'search'])
    ->name('products.search');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('orders', [OrderController::class, 'showOrders'])
    ->name('orders')
    ->middleware('auth');
    
Route::post('orders/{order}/return', [OrderController::class, 'returnOrder'])
    ->name('orders.return')
    ->middleware('auth');

Route::get('orders/confirmation/{id}', [OrderController::class, 'confirmation'])
    ->name('order.confirmation')
    ->middleware('auth');

Route::get('/about', function () {
    return view('about');}) ->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('forgot-password', [App\Http\Controllers\PasswordResetController::class, 'showForm'])
    ->name('password.request');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
Route::get('/privacypolicy', function () {
return view('privacypolicy');
})->name('privacy');

Route::post('reset-password', [App\Http\Controllers\PasswordResetController::class, 'resetPassword'])
    ->name('password.update');

Route::get('/helpdesk', [App\Http\Controllers\HelpDeskController::class, 'index'])
    ->name('helpdesk');

Route::post('/helpdesk', [App\Http\Controllers\HelpDeskController::class, 'submit'])
    ->name('helpdesk.submit');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('/products/store', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/products/edit/{product}', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::post('/products/update/{product}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/products/delete/{product}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');

    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::post('/orders/update/{order}', [AdminController::class, 'updateOrder'])->name('admin.orders.update');

    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/edit/{user}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/users/update/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/delete/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

});