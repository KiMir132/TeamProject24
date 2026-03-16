<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Quipment')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @yield('styles')
</head>
<body>

    <nav class="navbar">
        <div class="navbar-inner">

           
            <div class="navbar-left">
                <a href="{{ url('/') }}" class="navbar-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="E-Quipment" class="logo-img"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
                    <span class="logo-text">E-Quipment</span>
                </a>
            </div>

            
            <ul class="navbar-links">
                <li>
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active-nav' : '' }}">Home</a>
                </li>

                <li class="has-dropdown">
                    <a href="{{ route('products.index') }}" class="{{ request()->is('products*') ? 'active-nav' : '' }}">
                        Products ▾
                    </a>
                    <ul class="dropdown">
                        <li><a href="{{ route('products.index') }}">All Products</a></li>
                        @if(isset($navTypes))
                            @foreach($navTypes as $type)
                                <li><a href="{{ route('products.search', ['type' => $type]) }}">{{ $type }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>

                <li>
                    <a href="{{ route('about') }}" class="{{ request()->is('about') ? 'active-nav' : '' }}">About</a>
                </li>

                <li>
                    <a href="{{ route('contact') }}" class="{{ request()->is('contact') ? 'active-nav' : '' }}">Contact</a>
                </li>

                <li class="has-dropdown">
                    <a href="#">Support ▾</a>
                    <ul class="dropdown">
                        <li><a href="#">Live Chat</a></li>
                        <li><a href="#">Help Desk / Feedback</a></li>
                    </ul>
                </li>
            </ul>

            
            <div class="navbar-right">
                <button id="theme-toggle" class="theme-toggle" title="Toggle dark mode">☀ / ☾</button>

                @auth
                    <div class="has-dropdown nav-user">
                        <a href="#" class="nav-auth-link">{{ auth()->user()->name }} ▾</a>
                        <ul class="dropdown dropdown-right">
                            <li><a href="{{ route('orders') }}">Order History</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                            

                        </ul>
                    </div>
                @else
                  <div class="has-dropdown nav-user">
                    <a href="#" class="nav-auth-link">Account ▾</a>
                   <ul class="dropdown dropdown-right">
                    <li><a href="{{ route('login') }}">Log In</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                   </ul>
                 </div>
             @endauth

                <a href="{{ route('cart') }}" class="nav-cart {{ request()->is('cart') ? 'active-nav' : '' }}" title="Cart">
                    🛒
                    @auth
                        @php
                            $cartCount = \App\Models\CartItem::whereHas('cart', fn($q) => $q->where('UID', auth()->id()))->sum('Quantity');
                        @endphp
                        <span class="cart-badge">{{ $cartCount }}</span>
                    @else
                        <span class="cart-badge">0</span>
                    @endauth
                </a>
            </div>

        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="footer-inner">
            <div>© {{ date('Y') }} E-Quipment. All rights reserved.</div>
            <div>Need help? <a href="{{ route('contact') }}">Contact us</a> or email E-Quipment123@gmail.com</div>
        </div>
    </footer>

    <script src="{{ asset('js/lightdark.js') }}"></script>
    
    
    <script src="https://cdn.botpress.cloud/webchat/v3.6/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2026/02/26/14/20260226143645-K2KG2DID.js" defer></script>
    
    
    @yield('scripts')
</body>
</html>