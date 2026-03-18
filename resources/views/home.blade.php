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

       

     @auth
        <section class="section-block">
          <div class="support-banner">
            <div class="support-banner-text">
              <h2>We're here when you need us.</h2>
              <p>
                 Have a question about a product or your order? Get in touch with our team directly, or head to our Help Desk for FAQs, troubleshooting guides, and to submit a support request.
              </p>
          </div>
          <div class="support-banner-actions">
            <a href="{{ route('contact') }}" class="btn-primary">Contact Us</a>
            <a href="{{ route('helpdesk') }}" class="btn-ghost">Help Desk</a>
          </div>
        </div>
     </section>
     @endauth
      
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