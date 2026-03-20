<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalOrders   = Order::count();
        $totalUsers    = User::count();
        $lowStock      = Product::where('Quantity', '<=', 5)->count();

        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'totalUsers', 'lowStock'));
    }

    public function products()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products', compact('products'));
    }

    public function createProduct()
    {
        return view('admin.create-product');
    }

    public function storeProduct(Request $request)
    {
        $data = $request->validate([
            'Name'        => 'required|string|max:255',
            'Description' => 'required|string',
            'Type'        => 'required|string|max:255',
            'Price'       => 'required|numeric',
            'Quantity'    => 'required|integer|min:0',
        ]);

        Product::create($data);
        return redirect()->route('admin.products');
    }

    public function editProduct(Product $product)
    {
        return view('admin.edit-product', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $data = $request->validate([
            'Name'        => 'required|string|max:255',
            'Description' => 'required|string',
            'Type'        => 'required|string|max:255',
            'Price'       => 'required|numeric',
            'Quantity'    => 'required|integer|min:0',
        ]);

        $product->update($data);
        return redirect()->route('admin.products');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products');
    }

    public function orders()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function updateOrder(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|string|max:50',
        ]);

        $order->update($data);
        return redirect()->route('admin.orders');
    }

    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user->update($data);
        return redirect()->route('admin.users');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users');
    }
}