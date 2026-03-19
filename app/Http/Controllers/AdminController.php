<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!auth()->check() || !auth()->user()->Is_admin) {
            abort(403);
        }

        $products = Product::count();
        $orders = Order::count();
        $users = User::count();

        return view('admin.dashboard', compact('products', 'orders', 'users'));
    }
}