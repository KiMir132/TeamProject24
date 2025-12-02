<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItems;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart(Request $request): View
    {
        $cart = Cart::where('UID', $request->user()->UID)
            ->with('items.product')
            ->first();

        return view('cart', compact('cart'));
    }

    public function makeCart(Request $request)
    {
        $cart = Cart::create([
            'UID' => $request->user()->UID,
            'Total_Price' => 0
        ]);

        return $cart;
    }
    
    public function addToCart(Request $request, Product $product)
    {
        $user = $request->user();
        $cart = Cart::where('UID', $user->UID)->first();

        if(!$cart)
        {
            $cart = $this->makeCart($request);
        }

        $cartItems = CartItems::where('CartID', $cart->CartID)
        ->where('ProductID', $product->ProductID)
        ->first();

        if ($cartItems)
        {
            $cartItems->Quantity += 1;
            $cartItems->Price = $cartItems->Quantity * $product->Price;
            $cartItems->save();
        } 
        
        else 
        {
            CartItems::create([
                'CartID' => $cart->CartID,
                'ProductID' => $product->ProductID,
                'Quantity' => 1,
                'Price' => $product->Price
            ]);
        }
    }

    public function removeFromCart(Request $request, Product $product)
    {
        $user = $request->user();

        $cart = Cart::where('UID', $user->UID)->first();

        if (!$cart) {
            return redirect()->route('cart.show')
                ->with('status', 'No cart found.');
        }

        $cartItems = CartItems::where('CartID', $cart->CartID)
            ->where('ProductID', $product->ProductID)
            ->first();

        if (!$cartItems) {
            return redirect()->route('cart.show')
                ->with('status', 'No items in cart');
        }

        $cartItems->delete();

        $cart->Total_Price = CartItems::where('CartID', $cart->CartID)->sum('Price');
        $cart->save();

        return redirect()->route('cart.show')->with('status', 'Item removed.');
    }

    public function showForm(Request $request)
    {
        $cart = Cart::where('UID', $request->user()->UID)
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart')
                ->with('status', 'Your cart is empty.');
        }

        return view('checkout', compact('cart'));
    }
}