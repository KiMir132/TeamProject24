<h1>Home</h1>

<form action="{{ route('products.search') }}" method="GET" style="margin-bottom: 20px;">
    <input
        type="text"
        name="q"
        placeholder="Search hardware..."
        value="{{ request('q') }}"
    >

   
    <input
        type="number"
        name="min_price"
        placeholder="Min price"
        value="{{ request('min_price') }}"
    >
    <input
        type="number"
        name="max_price"
        placeholder="Max price"
        value="{{ request('max_price') }}"
    >

    <button type="submit">Search</button>
</form>


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