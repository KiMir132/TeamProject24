<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products – E-Quipment</title>
    <link rel="stylesheet" href="{{ asset('css/productlistings.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    {{-- Nav --}}
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>

            <li>
                <a href="#" class="active-nav">Products ▾</a>
                <ul>
                    <li><a href="{{ route('products.index') }}">All Products</a></li>
                    @foreach($types as $type)
                        <li><a href="{{ route('products.search', ['type' => $type]) }}">{{ $type }}</a></li>
                    @endforeach
                </ul>
            </li>

            <li>
                <a href="#">User ▾</a>
                <ul>
                    @auth
                        <li><a href="{{ route('orders') }}">Order History</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    @else
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
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
                    <li><a href="#">Live Chat</a></li>
                    <li><a href="#">Help Desk / Feedback</a></li>
                </ul>
            </li>

            <li><a href="{{ route('cart') }}">Cart</a></li>

            <li>
                <button id="theme-toggle" class="theme-toggle">Mode Toggle</button>
            </li>
        </ul>
    </nav>

    {{-- Page Header --}}
    <section class="page-header">
        <div class="page-header-inner">
            <div class="page-header-eyebrow">E-Quipment Store</div>
            <h1 class="page-header-title">All Products</h1>
            <p class="page-header-sub">{{ $products->total() }} items available across all categories</p>
        </div>
    </section>

    {{-- Main Content --}}
    <main class="page-content">

        {{-- Search & Filter Panel --}}
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

        {{-- Category Pills --}}
        <div class="categories">
            <a href="{{ route('products.index') }}" class="category-pill {{ !request('type') ? 'active' : '' }}">All</a>
            @foreach($types as $type)
                <a href="{{ route('products.search', ['type' => $type]) }}"
                   class="category-pill {{ request('type') == $type ? 'active' : '' }}">
                    {{ $type }}
                </a>
            @endforeach
        </div>

        {{-- Products Header --}}
        <div class="products-header">
            <h2>All Products</h2>
            <span>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} items</span>
        </div>

        {{-- Product Grid --}}
        @if($products->count())
            <div class="product-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-type-badge">{{ $product->Type }}</div>
                        <div class="product-name">{{ $product->Name }}</div>
                        <div class="product-description">{{ $product->Description }}</div>

                        <div class="product-stock {{ $product->Quantity > 10 ? 'in-stock' : ($product->Quantity > 0 ? 'low-stock' : 'out-of-stock') }}">
                            @if($product->Quantity > 10)
                                ● In stock
                            @elseif($product->Quantity > 0)
                                ● Only {{ $product->Quantity }} left
                            @else
                                ● Out of stock
                            @endif
                        </div>

                        <div class="product-bottom">
                            <div class="product-price">
                                £{{ number_format($product->Price, 2) }}
                                <span>excl. VAT</span>
                            </div>

                            @if($product->Quantity > 0)
                                @auth
                                    <form method="POST" action="{{ route('cart.add', $product->ProductID) }}">
                                        @csrf
                                        <button type="submit" class="btn-add-cart">Add to cart</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn-add-cart">Add to cart</a>
                                @endauth
                            @else
                                <button class="btn-add-cart disabled" disabled>Out of stock</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
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

    {{-- Footer --}}
    <footer class="footer">
        <div class="footer-inner">
            <div>© {{ date('Y') }} E-Quipment. All rights reserved.</div>
            <div>Need help? Email E-Quipment123@gmail.com</div>
        </div>
    </footer>

    <script src="{{ asset('js/lightdark.js') }}"></script>
</body>
</html>