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
        NAV BAR GOES HERE
    </nav>

    <section id = "cart-section">
        <h1>Your Cart</h1>
        <div>
            @if(!$cart || $cart->items->isEmpty())
                <p>Your cart is empty.</p>
            @else
                @foreach($cart->items as $item)
                    <div>
                        <strong>{{ $item->product->Name }}</strong><br>
                        Quantity: {{ $item->Quantity }}<br>
                        Price: £{{ number_format($item->product->Price * $item->Quantity, 2)}}<br>

                        <form action="{{ route('cart.remove', $item->product->ProductID) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </div>
                @endforeach

                <h3>Total: £{{ $cart->items->sum('Price') }}</h3>
                <form action="{{ route('checkout.form') }}" method="get">
                    <button type="submit">Checkout</button>
                </form>
            @endif
        </div>
    </section>
</body>

</html>