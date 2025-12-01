<h2>Search results</h2>

@if($searchTerm)
    <p>Showing results for: <strong>{{ $searchTerm }}</strong></p>
@endif

@if($products->count() === 0)
    <p>No products found.</p>
@else
    @foreach($products as $product)
        <div>
            <h3>{{ $product->Name }}</h3>
            <p>Type: {{ $product->Type }}</p>
            <p>Price: £{{ number_format($product->Price, 2) }}</p>
            <p>{{ $product->Description }}</p>
        </div>
        <hr>
    @endforeach

    {{ $products->links() }}
@endif
