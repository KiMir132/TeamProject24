<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Quipment</title>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>

<body>
    <nav>
    <ul>
        <li>
            <a href="{{ url('/') }}">Home</a>
        </li>
        <li>
            <a href="#">User ▾</a>
            <ul>
                <li><a href="{{ route('register') }}">Registration</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('orders') }}">Orders history</a></li>
            </ul>
        </li>

        
        <li>
            <a href="{{ route('products.index') }}">Products ▾</a>
            
        </li>

        <li>
            <a href="#">Information ▾</a>
            <ul>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </li>

        
        <li>
            <a href="#">Support ▾</a>
            <ul>
                <li><a href="#">Live chat</a></li>
                <li><a href="#">Help desk / Feedback</a></li>
            </ul>
        </li>
    </ul>
    </nav>

    <section id = "cart-section">
        <div id = "cart-container">
            <h1 class="cart-head">Your Cart</h1>
            <div id="cart">
                @if(!$cart || $cart->items->isEmpty())
                    <p>Your cart is empty.</p>
                @else
                    @foreach($cart->items as $item)
                        <div class="product">
                            <div>
                                <img alt="Product Image"/>
                            </div>
                            <div>
                            <strong>{{ $item->product->Name }}</strong><br>
                            Quantity: {{ $item->Quantity }}<br>
                            Price: £{{ number_format($item->product->Price * $item->Quantity, 2)}}<br>
                            </div>
                            <div>
                            <form action="{{ route('cart.remove', $item->product->ProductID) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div id = "cart-total-container">
            <h1 class="cart-head">Cart Total</h1>
            <h3>Total: £{{ $cart->items->sum('Price') }}</h3>
            <form action="{{ route('checkout.form') }}" method="get">
                <button type="submit">Checkout</button>
            </form>
        </div>
    </section>
</body>

</html>