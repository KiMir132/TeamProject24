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

    public function confirmation(Request $request, $id)
    {
        $order = Order::where('OrderID', $id)
            ->where('UID', $request->user()->UID)
            ->with('items.product')
            ->firstOrFail();

        return view('order-confirmation', compact('order'));
    }

    public function returnOrder(Order $order)
    {
        if ($order->Status === 'Returned') {
            return back()->with('status', 'Order already returned');
        }

        foreach ($order->items as $item) {
            $product = $item->product;
            $product->Quantity += $item->Quantity;
            $product->save();
        }

        $order->Status = 'Returned';
        $order->save();

        return back()->with('status', 'Order has been returned');
    }
}