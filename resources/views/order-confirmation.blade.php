@extends('layouts.app')

@section('title', 'Order Confirmed – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('css/order-confirmation.css') }}">
@endsection

@section('content')

    
    <section class="confirmation-banner">
        <div class="confirmation-banner-inner">
            <div class="confirmation-icon">✅</div>
            <h1>Order Confirmed!</h1>
            <p>Thank you <strong>{{ auth()->user()->name }}</strong> — your order has been placed successfully. We'll get it ready for dispatch within 1–2 working days.</p>
            <div class="confirmation-order-ref">Order Reference: <strong>#{{ $order->OrderID }}</strong></div>
        </div>
    </section>

    <div class="orders-layout">

        
        <div class="order-card">

            
            <div class="order-card-header">
                <div class="order-card-header-left">
                    <div class="order-number">Order #{{ $order->OrderID }}</div>
                    <div class="order-date">
                        📅 Placed on {{ \Carbon\Carbon::parse($order->Order_date)->format('d M Y, H:i') }}
                    </div>
                </div>
                <div class="order-card-header-right">
                    <div class="order-status">
                        <span class="status-dot"></span> Processing
                    </div>
                    <div class="order-total-header">
                        £{{ number_format($order->items->sum(fn($i) => $i->Price), 2) }}
                    </div>
                </div>
            </div>

            
            <div class="order-items">
                <div class="order-items-title">Items Ordered</div>
                @foreach($order->items as $item)
                    <div class="order-item">
                        <div class="order-item-img">
                            <img src="{{ asset('images/products/' . $item->ProductID . '.jpg') }}"
                                 alt="{{ $item->product->Name }}"
                                 onerror="this.src='{{ asset('images/products/placeholder.jpg') }}'">
                        </div>
                        <div class="order-item-info">
                            <div class="order-item-name">{{ $item->product->Name }}</div>
                            <div class="order-item-type">{{ $item->product->Type }}</div>
                        </div>
                        <div class="order-item-qty">× {{ $item->Quantity }}</div>
                        <div class="order-item-price">£{{ number_format($item->Price, 2) }}</div>
                    </div>
                @endforeach
            </div>

            
            <div class="order-card-footer">
                <div class="order-footer-info">
                    <div class="order-footer-item">
                        🚚 <span>Estimated delivery: 1–3 working days</span>
                    </div>
                    <div class="order-footer-item">
                        🔄 <span>30-day returns policy applies</span>
                    </div>
                    <div class="order-footer-item">
                        📧 <span>A confirmation email will be sent shortly</span>
                    </div>
                </div>
                <div class="order-footer-total">
                    <div class="order-footer-row">
                        <span>Subtotal</span>
                        <span>£{{ number_format($order->items->sum(fn($i) => $i->Price), 2) }}</span>
                    </div>
                    <div class="order-footer-row">
                        <span>Shipping</span>
                        <span>{{ $order->items->sum(fn($i) => $i->Price) >= 50 ? 'Free' : '£4.99' }}</span>
                    </div>
                    <div class="order-footer-row total">
                        <span>Total</span>
                        <span>£{{ number_format($order->items->sum(fn($i) => $i->Price) >= 50 ? $order->items->sum(fn($i) => $i->Price) : $order->items->sum(fn($i) => $i->Price) + 4.99, 2) }}</span>
                    </div>
                </div>
            </div>

        </div>

        
        <div class="confirmation-actions">
            <a href="{{ route('orders') }}" class="btn-primary">View Order History</a>
            <a href="{{ route('products.index') }}" class="btn-ghost">Continue Shopping</a>
        </div>

    </div>

@endsection