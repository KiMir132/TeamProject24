<h1>Your Cart</h1>

<div>
    @if(!$cart || $cart->items->isEmpty())
        <p>Your cart is empty.</p>
    @else
        @foreach($cart->items as $item)
            <div>
                <strong>{{ $item->product->Name }}</strong><br>
                Quantity: {{ $item->Quantity }}<br>
                Price: £{{ $item->Price }}<br><br>

                <form action="{{ route('cart.remove', $item->product->ProductID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Remove</button>
                </form>
            </div>
        @endforeach

        <h3>Total: £{{ $cart->items->sum('Price') }}</h3>
    @endif
</div>
