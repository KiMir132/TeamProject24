<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
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

        if ($product->Quantity <= 0) {
            return redirect()->route('cart')
                ->with('status', 'Product is out of stock');
        }

        $cartItem = CartItem::where('CartID', $cart->CartID)
            ->where('ProductID', $product->ProductID)
            ->first();

        if ($cartItem)
        {
            if ($cartItem->Quantity >= $product->Quantity) {
                return redirect()->route('cart')
                    ->with('status', 'Not enough stock');
            }

            $cartItem->Quantity += 1;
            $cartItem->Price = $cartItem->Quantity * $product->Price;
            $cartItem->save();
        } 
        else 
        {
            CartItem::create([
                'CartID' => $cart->CartID,
                'ProductID' => $product->ProductID,
                'Quantity' => 1,
                'Price' => $product->Price
            ]);
        }

        $cart->Total_Price = CartItem::where('CartID', $cart->CartID)->sum('Price');
        $cart->save();

        return redirect()->route('cart');
    }

    public function removeFromCart(Request $request, Product $product)
    {
        $user = $request->user();
        $cart = Cart::where('UID', $user->UID)->first();
        
        if (!$cart) {
            return redirect()->route('cart')
                ->with('status', 'No cart found.');
        }
        $cartItem = CartItem::where('CartID', $cart->CartID)
            ->where('ProductID', $product->ProductID)
            ->first();
        if (!$cartItem) {
            return redirect()->route('cart')
                ->with('status', 'No items in cart');
        }
        $cartItem->delete();
        $cart->Total_Price = CartItem::where('CartID', $cart->CartID)->sum('Price');
        $cart->save();
        return redirect()->route('cart')->with('status', 'Item removed.');
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

    public function checkout(Request $request)
    {
        $user = $request->user();
        $cart = Cart::where('UID', $user->UID)
            ->with('items.product')
            ->first();
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back()->withErrors('Your cart is empty.');
        }
        foreach ($cart->items as $item) {
            if ($item->product->Quantity < $item->Quantity) {
                return redirect()->route('cart')
                    ->with('status', 'One or more items do not have enough stock.');
            }
        }

        $totalPrice = 0;
        foreach ($cart->items as $item) {
            $totalPrice += $item->Price;
        }

        $order = Order::create([
          'UID'            => $user->UID,
          'Order_date'     => now(),
          'full_name'      => $request->full_name,
          'email'          => $request->email,
          'address_line1'  => $request->address_line1,
          'city'           => $request->city,
          'zip'            => $request->zip,
          'TotalPrice'     => $totalPrice,
          'Status'         => 'Pending'
       ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'OrderID'   => $order->OrderID,
                'ProductID' => $item->ProductID,
                'Quantity'  => $item->Quantity,
                'Price'     => $item->Price,
            ]);
            $product = $item->product;
            $product->Quantity -= $item->Quantity;
            $product->save();
        }

        $cart->items()->delete();
        $cart->Total_Price = 0;
        $cart->save();

        return redirect()->route('order.confirmation', $order->OrderID);
    }

    public function increase($productID)
    {
        $userID = auth()->id();
        $cart = Cart::where('UID', $userID)->first();
        $cartItem = CartItem::where('ProductID', $productID)
            ->where('CartID', $cart->CartID)
            ->first();
        $product = Product::where('ProductID', $productID)->first();
        if ($cartItem && $product) {
            if ($cartItem->Quantity >= $product->Quantity) {
                return back()->with('status', 'Max stock');
            }
            $cartItem->Quantity++;
            $cartItem->Price = $cartItem->Quantity * $product->Price;
            $cartItem->save();
        }
        $cart->Total_Price = CartItem::where('CartID', $cart->CartID)->sum('Price');
        $cart->save();
        return back();
    }

    public function decrease($productID)
    {
        $userID = auth()->id();
        $cart = Cart::where('UID', $userID)->first();
        $cartItem = CartItem::where('ProductID', $productID)->where('CartID', $cart->CartID)->first();
        $ProductPrice = Product::where('ProductID', $cartItem->ProductID)->value('Price');
        if ($cartItem) {
            if ($cartItem->Quantity > 1) {
                $cartItem->Quantity--;
                $cartItem->Price -= $ProductPrice;
                $cartItem->save();
            } else {
                $cartItem->delete();
            }
        }
        $cart->Total_Price = CartItem::where('CartID', $cart->CartID)->sum('Price');
        $cart->save();
        return back();
    }
}