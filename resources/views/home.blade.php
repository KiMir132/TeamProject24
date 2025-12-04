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
            <form method="post" action="{{ route('cart.add', $product->ProductID) }}">
                @csrf
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    @endforeach
</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | ProTools Hardware</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Top nav */
        .navbar {
            background: #111827;
            color: #fff;
            padding: 16px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-logo {
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: 0.03em;
        }

        .navbar-links a {
            margin-left: 20px;
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .navbar-links a:hover {
            opacity: 1;
        }

        .navbar-cart {
            background: #f97316;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 0.9rem;
        }

        /* Hero section */
        .hero {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            padding: 60px 40px 40px;
            background: linear-gradient(135deg, #111827, #1f2937);
            color: #fff;
        }

        .hero-text {
            flex: 1 1 320px;
            max-width: 560px;
            padding-right: 40px;
        }

        .hero-eyebrow {
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 0.75rem;
            color: #9ca3af;
            margin-bottom: 8px;
        }

        .hero-title {
            font-size: 2.4rem;
            margin: 0 0 16px;
        }

        .hero-subtitle {
            font-size: 1rem;
            color: #d1d5db;
            margin-bottom: 24px;
        }

        .hero-cta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
        }

        .btn-primary {
            background: #f97316;
            border: none;
            color: #111827;
            padding: 10px 22px;
            border-radius: 999px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn-primary:hover {
            background: #fb923c;
        }

        .btn-secondary {
            border: 1px solid #4b5563;
            background: transparent;
            color: #e5e7eb;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .hero-badges {
            margin-top: 28px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            font-size: 0.85rem;
            color: #9ca3af;
        }

        .hero-badge-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .hero-badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 999px;
            background: #22c55e;
        }

        .hero-image {
            flex: 1 1 280px;
            max-width: 480px;
            margin-top: 30px;
        }

        .hero-placeholder {
            width: 100%;
            min-height: 220px;
            border-radius: 24px;
            background: radial-gradient(circle at top left, #f97316, #111827);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            border: 1px solid rgba(249, 115, 22, 0.4);
        }

        .hero-placeholder span {
            font-size: 1rem;
            color: #fee2e2;
        }

        /* Main content wrapper */
        .page-content {
            padding: 30px 40px 60px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Search/filter panel */
        .search-panel {
            background: #ffffff;
            padding: 18px 20px;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
            margin-bottom: 26px;
        }

        .search-panel-title {
            font-weight: 600;
            margin-bottom: 12px;
        }

        .search-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
        }

        .search-row label {
            font-size: 0.8rem;
            font-weight: 500;
            color: #4b5563;
        }

        .search-field-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1 1 140px;
            min-width: 140px;
        }

        .search-input {
            padding: 8px 10px;
            border-radius: 999px;
            border: 1px solid #d1d5db;
            font-size: 0.9rem;
        }

        .search-input:focus {
            outline: none;
            border-color: #f97316;
        }

        .search-button {
            margin-left: auto;
            flex: 0 0 auto;
        }

        /* Category highlight (optional static) */
        .categories {
            margin: 10px 0 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .category-pill {
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 0.8rem;
            background: #e5e7eb;
            color: #374151;
        }

        .category-pill.featured {
            background: #f97316;
            color: #111827;
            font-weight: 600;
        }

        /* Products section */
        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 16px;
        }

        .products-header h2 {
            margin: 0;
        }

        .products-header span {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
        }

        .product-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 14px 14px 16px;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-name {
            font-weight: 600;
            margin-bottom: 4px;
            font-size: 1rem;
        }

        .product-description {
            font-size: 0.85rem;
            color: #4b5563;
            margin-bottom: 10px;
            min-height: 38px;
        }

        .product-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .product-price {
            font-weight: 700;
            font-size: 1rem;
            color: #111827;
        }

        .product-price span {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 400;
        }

        .product-card form {
            margin: 0;
        }

        .btn-add-cart {
            background: #111827;
            color: #fff;
            border: none;
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 0.85rem;
            cursor: pointer;
        }

        .btn-add-cart:hover {
            background: #020617;
        }

        /* Footer */
        .footer {
            padding: 24px 40px;
            background: #111827;
            color: #9ca3af;
            font-size: 0.85rem;
            margin-top: 40px;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 40px 20px 26px;
            }

            .page-content {
                padding: 24px 20px 40px;
            }

            .navbar {
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>

    {{-- Top Navigation --}}
    <header class="navbar">
        <div class="navbar-logo">
            ProTools Hardware
        </div>
        <nav class="navbar-links">
            <a href="#">Home</a>
            <a href="#products">Products</a>
            <a href="#contact">Support</a>
            <a href="#" class="navbar-cart">Cart</a>
        </nav>
    </header>

    {{-- Hero Section --}}
    <section class="hero">
        <div class="hero-text">
            <div class="hero-eyebrow">Professional hardware supplier</div>
            <h1 class="hero-title">Quality tools and hardware for every job.</h1>
            <p class="hero-subtitle">
                From drills and saws to screws and fixings, we’ve got everything you need
                to finish your next project faster and safer.
            </p>

            <div class="hero-cta">
                <a href="#products">
                    <button class="btn-primary">Shop featured hardware</button>
                </a>
                <button class="btn-secondary" type="button">View trade discounts</button>
            </div>

            <div class="hero-badges">
                <div class="hero-badge-item">
                    <div class="hero-badge-dot"></div>
                    <span>Fast UK delivery</span>
                </div>
                <div class="hero-badge-item">
                    <div class="hero-badge-dot"></div>
                    <span>Trusted by contractors</span>
                </div>
                <div class="hero-badge-item">
                    <div class="hero-badge-dot"></div>
                    <span>30-day returns</span>
                </div>
            </div>
        </div>

        <div class="hero-image">
            <div class="hero-placeholder">
                <span>Hero image of drills, wrenches and other hardware goes here.</span>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <main class="page-content">

        {{-- Search / Filter --}}
        <section class="search-panel">
            <div class="search-panel-title">Find the right hardware</div>
            <form action="{{ route('products.search') }}" method="GET">
                <div class="search-row">
                    <div class="search-field-group">
                        <label for="search-q">Search</label>
                        <input
                            id="search-q"
                            class="search-input"
                            type="text"
                            name="q"
                            placeholder="Search drills, screws, saws..."
                            value="{{ request('q') }}"
                        >
                    </div>

                    <div class="search-field-group">
                        <label for="min-price">Min price (£)</label>
                        <input
                            id="min-price"
                            class="search-input"
                            type="number"
                            name="min_price"
                            placeholder="0"
                            min="0"
                            value="{{ request('min_price') }}"
                        >
                    </div>

                    <div class="search-field-group">
                        <label for="max-price">Max price (£)</label>
                        <input
                            id="max-price"
                            class="search-input"
                            type="number"
                            name="max_price"
                            placeholder="500"
                            min="0"
                            value="{{ request('max_price') }}"
                        >
                    </div>

                    <div class="search-button">
                        <button type="submit" class="btn-primary">
                            Search
                        </button>
                    </div>
                </div>
            </form>

            {{-- Optional static categories row --}}
            <div class="categories">
                <span class="category-pill featured">All hardware</span>
                <span class="category-pill">Power tools</span>
                <span class="category-pill">Hand tools</span>
                <span class="category-pill">Fixings &amp; fasteners</span>
                <span class="category-pill">Safety gear</span>
            </div>
        </section>

        {{-- Products --}}
        <section id="products">
            <div class="products-header">
                <h2>Featured Products</h2>
                <span>
                    @if($products->count())
                        Showing {{ $products->count() }} item(s)
                    @else
                        No products found. Try adjusting your search.
                    @endif
                </span>
            </div>

            @if($products->count())
                <div class="product-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <div>
                                <div class="product-name">
                                    {{ $product->Name }}
                                </div>
                                <div class="product-description">
                                    {{ $product->Description }}
                                </div>
                            </div>

                            <div class="product-bottom">
                                <div class="product-price">
                                    £{{ number_format($product->Price, 2) }}
                                    <span>excl. VAT</span>
                                </div>

                                <form method="POST" action="{{ route('cart.add', $product->ProductID) }}">
                                    @csrf
                                    <button type="submit" class="btn-add-cart">
                                        Add to cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

    </main>

    {{-- Footer --}}
    <footer class="footer" id="contact">
        <div class="footer-inner">
            <div>© {{ date('Y') }} ProTools Hardware. All rights reserved.</div>
            <div>Need help? Email support@protools-hardware.test</div>
        </div>
    </footer>

</body>
</html>
