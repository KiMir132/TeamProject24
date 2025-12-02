<h1>Home</h1>

<div>
    <h1>Products</h1>
    @foreach($products as $product)
        <div>
            <strong>{{ $product->Name }}</strong><br>
            {{ $product->Description }}<br>
            Price: £{{ $product->Price }}
            <form method="post" action="{{ route('cart.add', $product->ProductID) }}">
                @csrf
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    @endforeach
</div>