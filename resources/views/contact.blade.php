@extends('layouts.app')

@section('title', 'Contact Us – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

    
    <section class="contact-hero">
        <div class="contact-hero-inner">
            <div class="contact-hero-eyebrow">We're here to help</div>
            <h1>Contact Us</h1>
            <p>Have a question about an order, a product, or your account? Send us a message and we'll get back to you promptly.</p>
        </div>
    </section>

    <div class="page-content contact-layout">

        

        {{-- Form --}}
        <div class="contact-form-wrapper">
            <div class="contact-form-header">
                <h2>Send a Message</h2>
                <p>Fill in the form below and our team will be in touch.</p>
            </div>

            <form id="contactForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" placeholder="Ahmed Rawi" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" placeholder="Ahmed@example.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select id="subject">
                        <option value="">Select a topic...</option>
                        <option value="order">Order enquiry</option>
                        <option value="product">Product question</option>
                        <option value="return">Returns & refunds</option>
                        <option value="technical">Technical support</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" rows="5" placeholder="Tell us how we can help you..." required></textarea>
                </div>

                <button type="submit" class="btn-primary contact-submit">Send Message →</button>
            </form>

            <div id="responseMessage">
                <div class="response-icon">✅</div>
                <div>
                    <strong>Message sent!</strong><br>
                    Thank you for reaching out. Our team will get back to you within 24 hours.
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endsection