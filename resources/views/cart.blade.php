@extends('layouts.app')

@section('title', 'Your Cart – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')

    <section class="cart-page-header">
        <div class="cart-page-header-inner">
            <div class="cart-header-eyebrow">E-Quipment</div>
            <h1>Your Cart</h1>
            @if(session('status'))
                <p class="cart-status-msg">{{ session('status') }}</p>
            @endif
        </div>
    </section>

    <div class="cart-layout">

        
        <div class="cart-items-panel">
            @if(!$cart || $cart->items->isEmpty())
                <div class="cart-empty">
                    <div class="cart-empty-icon">🛒</div>
                    <h3>Your cart is empty</h3>
                    <p>Looks like you haven't added anything yet.</p>
                    <a href="{{ route('products.index') }}" class="btn-primary">Browse products</a>
                </div>
            @else
                <div class="cart-items-header">
                    <span>Product</span>
                    <span>Quantity</span>
                    <span>Price</span>
                    <span></span>
                </div>

                @foreach($cart->items as $item)
                    <div class="cart-item">
                        <div class="cart-item-info">
                            <div class="cart-item-badge">{{ $item->product->Type }}</div>
                            <div class="cart-item-name">{{ $item->product->Name }}</div>
                            <div class="cart-item-unit">£{{ number_format($item->product->Price, 2) }} each</div>
                        </div>

                        <div class="cart-item-qty">
                            <form action="{{ route('cart.decrease', $item->product->ProductID) }}" method="post" class="inlineForm">
                                @csrf @method('PATCH')
                                <button type="submit" class="qty-btn">−</button>
                            </form>
                            <span class="qty-value">{{ $item->Quantity }}</span>
                            <form action="{{ route('cart.increase', $item->product->ProductID) }}" method="post" class="inlineForm">
                                @csrf @method('PATCH')
                                <button type="submit" class="qty-btn">+</button>
                            </form>
                        </div>

                        <div class="cart-item-total">
                            £{{ number_format($item->product->Price * $item->Quantity, 2) }}
                        </div>

                        <div class="cart-item-remove">
                            <form action="{{ route('cart.remove', $item->product->ProductID) }}" method="post">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-remove" title="Remove">✕</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <div class="cart-continue">
                    <a href="{{ route('products.index') }}" class="btn-ghost">← Continue shopping</a>
                </div>
            @endif
        </div>

        {{-- Summary --}}
        @if($cart && $cart->items->isNotEmpty())
            <div class="cart-summary-panel">
                <h2>Order Summary</h2>

                <div class="summary-lines">
                    @foreach($cart->items as $item)
                        <div class="summary-line">
                            <span>{{ $item->product->Name }} × {{ $item->Quantity }}</span>
                            <span>£{{ number_format($item->product->Price * $item->Quantity, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="summary-divider"></div>

                <div class="summary-total">
                    <span>Total</span>
                    <span>£{{ number_format($cart->items->sum('Price'), 2) }}</span>
                </div>

                <div class="summary-note">Excluding VAT. Shipping calculated at checkout.</div>

                <form action="{{ route('checkout.form') }}" method="get">
                    <button type="submit" class="btn-primary btn-checkout">Proceed to Checkout →</button>
                </form>
            </div>
        @endif

    </div>

@endsection