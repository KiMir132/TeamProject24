@extends('layouts.app')

@section('title', 'About Us – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')

    <section class="about-split">
        <div class="about-split-inner">
            <div class="about-split-text">
                <div class="about-eyebrow">Who we are</div>
                <h1>About Us</h1>
                <p>Welcome to <strong>E-Quipment</strong>, your trusted destination for high-quality computer hardware and components, designed to last. Our goal is to make PC building and upgrading simple, accessible, and enjoyable by offering only premium parts that meet our quality standards.</p>
                <p>At E-Quipment, we partner with reputable brands and carefully select every item in our store to ensure it delivers the performance, durability, and value our customers expect. Whether you are assembling your first PC or optimising a powerful rig, our expert team is here to support you every step of the way.</p>
            </div>
            <div class="about-split-image">
                <img src="{{ asset('images/about/about-team.png') }}" alt="E-Quipment Team"
                     onerror="this.parentElement.classList.add('no-image')">
            </div>
        </div>
    </section>

   
    <section class="about-split about-split-reverse about-split-tinted">
        <div class="about-split-inner">
            <div class="about-split-image">
                <img src="{{ asset('images/about/about-mission.png') }}" alt="Our Mission"
                     onerror="this.parentElement.classList.add('no-image')">
            </div>
            <div class="about-split-text">
                <div class="about-eyebrow">What drives us</div>
                <h2>Our Mission</h2>
                <p>We believe that building your ideal PC should not be complicated or intimidating. Our mission is to provide every customer — from first-time builders to seasoned professionals — with the right components, clear guidance, and a seamless shopping experience.</p>
                <p>We provide clear product descriptions, expert recommendations, and a smooth shopping experience so you can find exactly what you need without the confusion.</p>
            </div>
        </div>
    </section>

    
    <section class="about-split">
        <div class="about-split-inner">
            <div class="about-split-text">
                <div class="about-eyebrow">Why shop with us</div>
                <h2>Built Around You</h2>
                <p>Everything about E-Quipment is designed with the customer in mind. From carefully curated products to a secure checkout and responsive support team, we make sure your experience is smooth from start to finish.</p>
                <ul class="about-list">
                    <li><span class="about-list-icon">✓</span> Carefully organised, reliable hardware and components</li>
                    <li><span class="about-list-icon">✓</span> Clear information and honest recommendations</li>
                    <li><span class="about-list-icon">✓</span> Supportive team ready to help with your build</li>
                    <li><span class="about-list-icon">✓</span> Secure checkout and straightforward order history</li>
                    <li><span class="about-list-icon">✓</span> Fast UK delivery and 30-day returns policy</li>
                </ul>
            </div>
            <div class="about-split-image">
                <img src="{{ asset('images/about/about-store.png') }}" alt="E-Quipment Store"
                     onerror="this.parentElement.classList.add('no-image')">
            </div>
        </div>
    </section>


    <section class="about-cta-section">
        <div class="about-cta-inner">
            <h2>Ready to start building?</h2>
            <p>Have a question? Visit our <a href="{{ route('contact') }}" class="about-link">Contact Us</a> page and our team will be happy to help.</p>
            <div class="about-cta-actions">
                <a href="{{ route('products.index') }}" class="btn-primary">Browse Products</a>
                <a href="{{ route('register') }}" class="btn-ghost">Create Account</a>
            </div>
        </div>
    </section>

@endsection