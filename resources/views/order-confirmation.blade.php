@extends('layouts.app')

@section('title', 'Order Confirmed – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/order-confirmation.css') }}">
@endsection

@section('content')

<div class="confirmation-page">
    <div class="confirmation-layout">

        
        <div class="confirmation-left">
            <div class="confirmation-thank-you">
               
                <h1>Thank you for your purchase!</h1>
                <p>Your order will be processed within 24 hours during working days. We will notify you by email once your order has been dispatched.</p>
            </div>

            <div class="confirmation-billing">
                <h2>Billing Address</h2>
                <div class="billing-row">
                    <span class="billing-label">Name</span>
                    <span class="billing-value">{{ $order->full_name }}</span>
                </div>
                <div class="billing-row">
                    <span class="billing-label">Email</span>
                    <span class="billing-value">{{ $order->email }}</span>
                </div>
                <div class="billing-row">
                    <span class="billing-label">Order Date</span>
                    <span class="billing-value">{{ \Carbon\Carbon::parse($order->Order_date)->format('d M Y') }}</span>
                </div>
                <div class="billing-row">
                    <span class="billing-label">Order Number</span>
                    <span class="billing-value">#{{ $order->OrderID }}</span>
                </div>
                <div class="billing-row">
                    <span class="billing-label">Status</span>
                    <span class="billing-value billing-status">Processing</span>
                </div>
            </div>

            <div class="confirmation-actions">
                <a href="{{ route('orders') }}" class="btn-primary">View Order History</a>
                <a href="{{ route('products.index') }}" class="btn-ghost">Continue Shopping</a>
            </div>
        </div>

       
        <div class="confirmation-right">
            <div class="confirmation-summary-box">
                <h2>Order Summary</h2>

                <div class="summary-meta">
                    <div class="summary-meta-item">
                        <span class="summary-meta-label">Date</span>
                        <span class="summary-meta-value">{{ \Carbon\Carbon::parse($order->Order_date)->format('d M Y') }}</span>
                    </div>
                    <div class="summary-meta-item">
                        <span class="summary-meta-label">Order Number</span>
                        <span class="summary-meta-value">#{{ $order->OrderID }}</span>
                    </div>
                    <div class="summary-meta-item">
                        <span class="summary-meta-label">Payment Method</span>
                        <span class="summary-meta-value">Card</span>
                    </div>
                </div>

                
                <div class="summary-items">
                    @foreach($order->items as $item)
                        <div class="summary-item">
                            <div class="summary-item-img">
                                <img src="{{ asset('images/products/' . $item->ProductID . '.jpg') }}"
                                     alt="{{ $item->product->Name }}"
                                     onerror="this.src='{{ asset('images/products/placeholder.jpg') }}'">
                            </div>
                            <div class="summary-item-info">
                                <div class="summary-item-name">{{ $item->product->Name }}</div>
                                <div class="summary-item-type">{{ $item->product->Type }}</div>
                                <div class="summary-item-qty">Qty: {{ $item->Quantity }}</div>
                            </div>
                            <div class="summary-item-price">£{{ number_format($item->Price, 2) }}</div>
                        </div>
                    @endforeach
                </div>

               
                <div class="summary-totals">
                    <div class="summary-total-row">
                        <span>Sub Total</span>
                        <span>£{{ number_format($order->items->sum(fn($i) => $i->Price), 2) }}</span>
                    </div>
                    <div class="summary-total-row">
                        <span>Shipping</span>
                        <span>{{ $order->items->sum(fn($i) => $i->Price) >= 50 ? 'Free' : '£4.99' }}</span>
                    </div>
                    <div class="summary-total-row grand-total">
                        <span>Order Total</span>
                        <span>£{{ number_format($order->items->sum(fn($i) => $i->Price) >= 50 ? $order->items->sum(fn($i) => $i->Price) : $order->items->sum(fn($i) => $i->Price) + 4.99, 2) }}</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection