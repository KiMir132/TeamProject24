@extends('layouts.app')

@section('title', 'Products – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/productlistings.css') }}">
@endsection

@section('content')

    <section class="page-header">
        <div class="page-header-inner">
            <div class="page-header-eyebrow">E-Quipment Store</div>
            <h1 class="page-header-title">All Products</h1>
            <p class="page-header-sub">{{ $products->total() }} items available across all categories</p>
        </div>
    </section>

    <main class="page-content">

        <section class="search-panel">
            <div class="search-panel-title">Filter &amp; Search</div>
            <form action="{{ route('products.search') }}" method="GET">
                <div class="search-row">
                    <div class="search-field-group">
                        <label for="search-q">Search</label>
                        <input id="search-q" class="search-input" type="text" name="q"
                            placeholder="Search GPU, SSD, CPU..." value="{{ request('q') }}">
                    </div>
                    <div class="search-field-group">
                        <label for="type-filter">Category</label>
                        <select id="type-filter" class="search-input" name="type">
                            <option value="">All Categories</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search-field-group">
                        <label for="min-price">Min Price (£)</label>
                        <input id="min-price" class="search-input" type="number" name="min_price"
                            placeholder="0" min="0" value="{{ request('min_price') }}">
                    </div>
                    <div class="search-field-group">
                        <label for="max-price">Max Price (£)</label>
                        <input id="max-price" class="search-input" type="number" name="max_price"
                            placeholder="1500" min="0" value="{{ request('max_price') }}">
                    </div>
                    <div class="search-button">
                        <button type="submit" class="btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </section>

        <div class="categories">
            <a href="{{ route('products.index') }}" class="category-pill {{ !request('type') ? 'active' : '' }}">All</a>
            @foreach($types as $type)
                <a href="{{ route('products.search', ['type' => $type]) }}"
                   class="category-pill {{ request('type') == $type ? 'active' : '' }}">
                    {{ $type }}
                </a>
            @endforeach
        </div>

        <div class="products-header">
            <h2>All Products</h2>
            <span>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} items</span>
        </div>

        @if($products->count())
            <div class="product-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-card-img">
                          <img src="{{ asset('images/products/' . $product->ProductID . '.jpg') }}"
                             alt="{{ $product->Name }}"
                              onerror="this.src='{{ asset('images/products/placeholder.jpg') }}'">
                       </div>
                        <div class="product-type-badge">{{ $product->Type }}</div>
                        <div class="product-name">{{ $product->Name }}</div>
                        <div class="product-description">{{ $product->Description }}</div>
                        <div class="product-stock {{ $product->Quantity > 10 ? 'in-stock' : ($product->Quantity > 0 ? 'low-stock' : 'out-of-stock') }}">
                            @if($product->Quantity > 10) ● In stock
                            @elseif($product->Quantity > 0) ● Only {{ $product->Quantity }} left
                            @else ● Out of stock
                            @endif
                        </div>
                     
                            <div class="product-bottom">
    <div class="product-price">
        £{{ number_format($product->Price, 2) }}
        <span>excl. VAT</span>
    </div>
    <a href="{{ route('products.show', $product->ProductID) }}" class="btn-add-cart">Shop →</a>
</div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrapper">
                {{ $products->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">📦</div>
                <h3>No products found</h3>
                <p>Try adjusting your search or filter.</p>
                <a href="{{ route('products.index') }}" class="btn-primary">Clear filters</a>
            </div>
        @endif

    </main>

@endsection