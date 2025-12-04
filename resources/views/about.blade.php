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
  <section class="about-hero">
      <div class="about-hero-inner">
        <h1>About Us</h1>
        <p>Your trusted destination for quality PC hardware and components.</p>
      </div>
  </section>
<div class="page-content about-page">
    

    <div class="about-grid">
        <section class="about-main-card">
            <p>
                Welcome to <strong>E-Quipment</strong>, your trusted destination for high-quality computer hardware and components, designed to last. Our goal is to make PC building and upgrading simple, accessible, and enjoyable by offering only premium parts that meet our quality standards.
            </p>
            <p>
                At E-Quipment, we partner with reputable brands and carefully select every item in our store to ensure it delivers the performance, durability, and value our customers expect. Whether you are assembling your first PC or optimising a powerful rig, our expert team is here to support you every step of the way.
            </p>
            <p>
                We provide clear product descriptions, expert recommendations, and a smooth shopping experience so you can find exactly what you need without the confusion.
            </p>
        </section>

        <aside class="about-side-card">
            <h2>Why shop with E-Quipment?</h2>
            <ul>
                <li>Carefully curated, reliable hardware and components</li>
                <li>Clear information and honest recommendations</li>
                <li>Supportive team ready to help with your build</li>
                <li>Secure checkout and straightforward order history</li>
            </ul>
        </aside>
    </div>

    <section class="about-cta">
        <p>If you have any questions, send us a message on the <a href="{{ route('contact') }}">Contact Us</a> page — our team will be happy to assist you.</p>
        <p>
            Ready to start shopping?
            <a href="{{ route('register') }}" class="btn-primary about-btn">Register</a>
            <span class="about-cta-text">Already have an account?</span>
            <a href="{{ route('login') }}" class="about-link">Log in</a>
        </p>
    </section>
</div>
    <footer class="footer" id="contact">
        <div class="footer-inner">
            <div>© {{ date('Y') }} E-Quipment. All rights reserved.</div>
            <div>Need help? Email E-Quipment123@gmail.com</div>
        </div>
    </footer>

</body>
</html>