@extends('layouts.app')

@section('title', 'Order History – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
@endsection

@section('content')

    <section class="orders-page-header">
        <div class="orders-page-header-inner">
            <div class="orders-eyebrow">My Account</div>
            <h1>Order History</h1>
            <p>Track and review all your past orders</p>
        </div>
    </section>

    <div class="orders-layout">

        @if($orders->isEmpty())
            <div class="orders-empty">
                <div class="orders-empty-icon"></div>
                <h3>No orders yet</h3>
                <p>Once you place an order, it will appear here.</p>
                <a href="{{ route('products.index') }}" class="btn-primary">Start shopping</a>
            </div>
        @else
            <div class="orders-summary-bar">
                <span>{{ $orders->count() }} order(s) placed</span>
                <a href="{{ route('products.index') }}" class="btn-ghost">Continue shopping →</a>
            </div>

            @foreach($orders as $order)
                <div class="order-card">

                    
                    <div class="order-card-header">
                        <div class="order-card-header-left">
                            <div class="order-number">Order #{{ $order->OrderID }}</div>
                            <div class="order-date">
                                 Placed on {{ \Carbon\Carbon::parse($order->Order_date)->format('d M Y') }}
                            </div>
                        </div>
                        <div class="order-card-header-right">
                            <div class="order-status">
                                <span class="status-dot"></span> Processing
                                <form action="{{ route('orders.return', $order) }}" method="POST" style="margin-top:10px;">
                                    @csrf
                                    <button type="submit" class="btn-primary" 
                                        @if($order->Status === 'Returned') disabled @endif>
                                        {{ $order->Status === 'Returned' ? 'Returned' : 'Return Order' }}
                                    </button>
                                </form>
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
                                 <span>Estimated delivery: 1–3 working days</span>
                            </div>
                            <div class="order-footer-item">
                                 <span>30-day returns policy applies</span>
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
            @endforeach
        @endif

    </div>

@endsection