<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Quipment')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body>

    <nav class="navbar">
        <div class="navbar-inner">
            <button class="nav-hamburger" id="navHamburger" aria-label="Toggle menu">
              <span></span>
              <span></span>
              <span></span>
            </button>
            
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
                        
                        <li><a href="{{ route('helpdesk') }}">Help Desk / Feedback</a></li>
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
                    <a href="{{ route('login') }}" class="nav-auth-link">Log In</a>
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

    <div class="mobile-menu" id="mobileMenu">
    <ul class="mobile-menu-links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('products.index') }}">Products</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('helpdesk') }}">Help Desk</a></li>
        @auth
            <li><a href="{{ route('orders') }}">Order History</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        @else
            <li><a href="{{ route('login') }}">Log In</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
        <li><a href="{{ route('cart') }}">Cart 🛒</a></li>
    </ul>
</div>

    @yield('content')

    <footer class="footer">
        <div class="footer-top">

           
            <div class="footer-col footer-brand">
                <div class="footer-logo">E-Quipment</div>
                <p class="footer-tagline">Your trusted UK destination for premium PC hardware, components and peripherals.</p>
                <div class="footer-contact">
                    <div class="footer-contact-item">
                        <i class='bx bx-envelope'></i>
                        <span>E-Quipment123@gmail.com</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class='bx bx-phone'></i>
                        <span>+44 (0) 123 456 7890</span>
                    </div>
                </div>
                <div class="footer-socials">
                    <a href="#" class="social-btn" title="Facebook"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="social-btn" title="Twitter/X"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="social-btn" title="Instagram"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="social-btn" title="YouTube"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>

           
            <div class="footer-col">
                <div class="footer-col-title">Shop</div>
                <ul class="footer-links">
                    <li><a href="{{ route('products.index') }}">All Products</a></li>
                    <li><a href="{{ route('products.search', ['type' => 'CPU']) }}">CPUs</a></li>
                    <li><a href="{{ route('products.search', ['type' => 'GPU']) }}">GPUs</a></li>
                    <li><a href="{{ route('products.search', ['type' => 'RAM']) }}">RAM</a></li>
                    <li><a href="{{ route('products.search', ['type' => 'Storage']) }}">Storage</a></li>
                    <li><a href="{{ route('products.search', ['type' => 'Monitor']) }}">Monitors</a></li>
                    <li><a href="{{ route('products.search', ['type' => 'Accessory']) }}">Accessories</a></li>
                </ul>
            </div>

            
            <div class="footer-col">
                <div class="footer-col-title">Support</div>
                <ul class="footer-links">
                    <li><a href="{{ route('helpdesk') }}">Help Desk</a></li>
                    <li><a href="{{ route('helpdesk') }}#faq">FAQs</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('orders') }}">Order History</a></li>
                    <li><a href="{{ route('helpdesk') }}">Returns & Refunds</a></li>
                </ul>
            </div>

            
            <div class="footer-col">
                <div class="footer-col-title">Company</div>
                <ul class="footer-links">
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>

            

        </div>

        
        <div class="footer-bottom">
            <div class="footer-bottom-inner">
                <div>© {{ date('Y') }} E-Quipment. All rights reserved.</div>
                <div class="footer-legal-links">
                    <a href="#">Privacy Policy</a>
                    <span>·</span>
                    <a href="#">Terms & Conditions</a>
                    <span>·</span>
                   
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/lightdark.js') }}"></script>
    <script>
    function subscribeNewsletter(e) {
        e.preventDefault();
        const email = document.getElementById('newsletterEmail').value;
        if (email) {
            document.getElementById('newsletterForm').style.display = 'none';
            document.getElementById('newsletterMsg').style.display = 'block';
        }
    }
    </script>

    
    <script src="https://cdn.botpress.cloud/webchat/v3.6/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2026/02/26/14/20260226143645-K2KG2DID.js" defer></script>
    

    <script>
document.getElementById('navHamburger').addEventListener('click', function() {
    this.classList.toggle('open');
    document.getElementById('mobileMenu').classList.toggle('open');
});
</script>

    @yield('scripts')
    
    
    
</body>
</html>