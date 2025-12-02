<h1>My Cart</h1>

<div>
    <h1>Your Cart</h1>

    @if($cart && $cart->items->count())
        @foreach($cart->items as $item)
            <div>
                {{ $item->product->Name }} – Qty: {{ $item->Quantity }} – ${{ $item->Price }}
            </div>
        @endforeach
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
