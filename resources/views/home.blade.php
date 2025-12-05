<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Quipment</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <nav>
    <ul>
        <li>
            <a href="{{ url('/') }}">Home</a>
        </li>

        
        <li>
            <a href="#">User ▾</a>
            <ul>
                <li><a href="{{ route('register') }}">Registration</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('orders') }}">Orders history</a></li>
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
                <li><a href="#">Live chat</a></li>
                <li><a href="#">Help desk / Feedback</a></li>
            </ul>
        </li>
    </ul>
    </nav>
    {{-- Hero Section --}}
    <section class="hero">
        <div class="hero-text">
            <div class="hero-eyebrow">Professional hardware supplier</div>
            <h1 class="hero-title">Quality tools and hardware for every job.</h1>

            <div class="hero-cta">
                <a href="#products">
                    <button class="btn-primary">Shop featured hardware</button>
                </a>
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
                            placeholder="Search cpu, capture cards, gpu..."
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
            <div>© {{ date('Y') }} E-Quipment. All rights reserved.</div>
            <div>Need help? Email E-Quipment123@gmail.com</div>
        </div>
    </footer>

    <script src="{{ asset('js/zoom.js') }}"></script>
</body>
</html>
