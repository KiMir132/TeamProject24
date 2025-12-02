<form action="{{ route('products.search') }}" method="GET">
    <input type="text"
           name="q"
           placeholder="Search for hardware..."
           value="{{ request('q') }}">

    {{-- OPTIONAL price filters --}}
    <input type="number" name="min_price" placeholder="Min price" value="{{ request('min_price') }}">
    <input type="number" name="max_price" placeholder="Max price" value="{{ request('max_price') }}">

    <button type="submit">Search</button>
</form>
