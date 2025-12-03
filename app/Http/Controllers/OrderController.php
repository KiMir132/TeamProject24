<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function showOrders(Request $request)
    {
        $orders = Order::where('UID', $request->user()->UID)
            ->with('items.product')
            ->orderBy('OrderID', 'DESC')
            ->get();

        return view('orders', compact('orders'));
    }
}