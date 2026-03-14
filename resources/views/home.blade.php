@extends('layouts.app')

@section('title', 'E-Quipment – Quality Hardware')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

   
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-eyebrow">Professional hardware supplier</div>
                <h1 class="hero-title">Build something<br><span class="hero-title-accent">extraordinary.</span></h1>
                <p class="hero-subtitle">Premium PC components, peripherals and networking gear — delivered fast across the UK.</p>
                <div class="hero-cta">
                    <a href="{{ route('products.index') }}" class="btn-primary">Shop our products</a>
                    <a href="{{ route('about') }}" class="btn-ghost">Learn about us</a>
                </div>
                <div class="hero-badges">
                    <div class="hero-badge-item"><div class="hero-badge-dot"></div><span>Fast UK delivery</span></div>
                    <div class="hero-badge-item"><div class="hero-badge-dot"></div><span>Trusted by contractors</span></div>
                    <div class="hero-badge-item"><div class="hero-badge-dot"></div><span>30-day returns</span></div>
                </div>
            </div>
           
        </div>
    </section>

   

    <main class="page-content">

        
        
        <section class="section-block">
            <div class="section-header">
                <h2>Browse by Category</h2>
                <a href="{{ route('products.index') }}" class="view-all-link">View all →</a>
            </div>
            <div class="category-grid">
                @foreach($categories as $cat)
                    @php
                        $images = [
                            'CPU'          => 'cpu.png',
                            
                            'RAM'          => 'ram.png',
                            
                           
                            'Case'         => 'case.png',
                            'Monitor'      => 'monitor.png',
                            
                        ];
                        $img = $images[$cat] ?? 'default.png';
                    @endphp
                    <a href="{{ route('products.search', ['type' => $cat]) }}" class="category-card"
                       style="background-image: url('{{ asset('images/categories/' . $img) }}')">
                        <span class="category-card-label">{{ $cat }}</span>
                    </a>
                @endforeach
            </div>
        </section>

       

       
        <section class="section-block why-section">
            <div class="section-header centered">
                <h2>Why Choose E-Quipment?</h2>
                <p class="section-subhead">We make PC building simple, accessible, and enjoyable.</p>
            </div>
            <div class="why-grid">
                <div class="why-card">
                    <div class="why-icon">✅</div>
                    <h3>Curated Selection</h3>
                    <p>Every product in our store is hand-picked and tested against quality standards — no filler, only parts that perform.</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">💬</div>
                    <h3>Expert Guidance</h3>
                    <p>Not sure what you need? Our support team knows hardware inside-out and is ready to help with your build.</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">📦</div>
                    <h3>Fast UK Shipping</h3>
                    <p>Orders dispatched quickly with reliable courier partners. Free delivery on qualifying orders over £50.</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">🔄</div>
                    <h3>Easy Returns</h3>
                    <p>Changed your mind? Our 30-day no-fuss returns policy means you can shop with confidence.</p>
                </div>
            </div>
        </section>

      
        @guest
        <section class="cta-banner">
            <div class="cta-banner-inner">
                <div>
                    <h2 class="cta-title">Ready to start building?</h2>
                    <p class="cta-sub">Create an account to save your cart, track orders and get personalised recommendations.</p>
                </div>
                <div class="cta-actions">
                    <a href="{{ route('register') }}" class="btn-primary">Create account</a>
                    <a href="{{ route('login') }}" class="btn-ghost-dark">Log in</a>
                </div>
            </div>
        </section>
        @endguest

    </main>

@endsection