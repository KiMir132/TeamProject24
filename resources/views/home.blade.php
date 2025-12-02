<h1>Home</h1>

<div>
    <h1>Products</h1>
    @foreach($products as $product)
        <div>
            <strong>{{ $product->Name }}</strong><br>
            {{ $product->Description }}<br>
            Price: £{{ $product->Price }}
        </div>
        <hr>
    @endforeach
</div>