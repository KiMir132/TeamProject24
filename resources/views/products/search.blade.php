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

    <div class="page-content">
    <div class="products-header">
        <h2>Search results</h2>

        @if($searchTerm)
            <span>
                Showing results for: <strong>{{ $searchTerm }}</strong>
                @if(method_exists($products, 'total'))
                    ({{ $products->total() }} items found)
                @endif
            </span>
        @else
            @if(method_exists($products, 'total'))
                <span>{{ $products->total() }} items found</span>
            @endif
        @endif
    </div>

    @if($products->count() === 0)
        <p>No products found. Try adjusting your search keywords.</p>
    @else
       <div class="product-grid">
    @foreach($products as $product)
        <div class="product-card" style="max-width: 360px;">
            <div class="product-name">{{ $product->Name }}</div>

            <div class="product-description">
                {{ $product->Description }}
            </div>

            <div class="product-bottom">
                <div class="product-price">
                    £{{ number_format($product->Price, 2) }}
                    <span>{{ $product->Type }}</span>
                </div>
            </div>
        </div>
     @endforeach
   </div>


        <div style="margin-top: 20px;">
            {{ $products->links() }}
        </div>
    @endif
</div>

<footer class="footer" id="contact">
        <div class="footer-inner">
            <div>© {{ date('Y') }} E-Quipment. All rights reserved.</div>
            <div>Need help? Email E-Quipment123@gmail.com</div>
        </div>
</footer>
