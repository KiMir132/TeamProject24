@extends('layouts.app')

@section('title', 'Checkout – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection

@section('content')

    <section class="checkout-page-header">
        <div class="checkout-page-header-inner">
            <div class="checkout-eyebrow">E-Quipment</div>
            <h1>Checkout</h1>
        </div>
    </section>

    <div class="checkout-layout">

        
        <div class="checkout-form-col">
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf

                <div class="checkout-section">
                    <div class="checkout-section-title">
                        <span class="checkout-step">1</span> Shipping Information
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" placeholder="Ahmed Rawi" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Ahmed@example.com" required>
                        </div>
                        <div class="form-group full-width">
                            <label>Address Line 1</label>
                            <input type="text" name="address_line1" placeholder="123 High Street" required>
                        </div>
                        <div class="form-group full-width">
                            <label>Address Line 2 <span class="optional">(Optional)</span></label>
                            <input type="text" name="address_line2" placeholder="Apartment, suite, etc.">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" placeholder="London" required>
                        </div>
                        <div class="form-group">
                            <label>Postcode</label>
                            <input type="text" name="zip" placeholder="SW1A 1AA" required>
                        </div>
                        <div class="form-group">
                            <label>Phone <span class="optional">(Optional)</span></label>
                            <input type="tel" name="phone" placeholder="+44 7700 900000">
                        </div>
                    </div>
                </div>

                <div class="checkout-section">
                    <div class="checkout-section-title">
                        <span class="checkout-step">2</span> Payment Method
                    </div>
                    <div class="payment-options">
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="credit_card" checked>
                            <span class="payment-option-box">💳 Credit Card</span>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="paypal">
                            <span class="payment-option-box">🅿️ PayPal</span>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="bank_transfer">
                            <span class="payment-option-box">🏦 Bank Transfer</span>
                        </label>
                    </div>
                    <div class="form-grid" style="margin-top:18px;">
                        <div class="form-group full-width">
                            <label>Card Number</label>
                            <input type="text" name="card_number" placeholder="XXXX XXXX XXXX XXXX">
                        </div>
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <input type="text" name="expiry_date" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <label>CVV</label>
                            <input type="text" name="cvv" maxlength="4" placeholder="•••">
                        </div>
                    </div>
                </div>

                <div class="checkout-section">
                    <label class="terms-label">
                        <input type="checkbox" name="terms" required>
                        I agree to the <a href="#" class="terms-link">terms and conditions</a>
                    </label>
                    <button type="submit" class="btn-primary btn-place-order">Place Order →</button>
                </div>

            </form>
        </div>

        
        <div class="checkout-summary-col">
            <div class="checkout-summary-box">
                <h2>Order Summary</h2>

                <div class="checkout-summary-items">
                    @foreach($cart->items as $item)
                        <div class="checkout-summary-item">
                            <div class="checkout-summary-item-info">
                                <span class="checkout-summary-item-name">{{ $item->product->Name }}</span>
                                <span class="checkout-summary-item-qty">× {{ $item->Quantity }}</span>
                            </div>
                            <span class="checkout-summary-item-price">£{{ number_format($item->Price, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="checkout-summary-divider"></div>

                <div class="checkout-summary-row">
                    <span>Subtotal</span>
                    <span>£{{ number_format($cart->items->sum('Price'), 2) }}</span>
                </div>
                <div class="checkout-summary-row muted">
                    <span>Shipping</span>
                    <span>{{ $cart->items->sum('Price') >= 50 ? 'Free' : '£4.99' }}</span>
                </div>

                <div class="checkout-summary-divider"></div>

                <div class="checkout-summary-row total">
                    <span>Total</span>
                    <span>£{{ number_format($cart->items->sum('Price') >= 50 ? $cart->items->sum('Price') : $cart->items->sum('Price') + 4.99, 2) }}</span>
                </div>

               
            </div>
        </div>

    </div>

@endsection