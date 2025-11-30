<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart(Request $request): View
    {
        $cart = Cart::where('UID', $request->user()->UID)
            ->with('items.product')
            ->first();
              
        return view('cart');
    }

    public function makeCart(Request $request)
    {
        $cart = Cart::create([
            'UID'=> $request->user()->UID,
            'Total_Price' => 0
        ]);

        return $cart;
    }
}
