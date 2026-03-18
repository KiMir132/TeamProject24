@extends('layouts.app')

@section('title', 'Help Desk & Feedback – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/helpdesk.css') }}">
@endsection

@section('content')

   
    <section class="helpdesk-header">
        <div class="helpdesk-header-inner">
            <div class="helpdesk-eyebrow">Support Centre</div>
            <h1>Help Desk & Feedback</h1>
            <p>Find answers, report issues, or share your feedback with our team.</p>
        </div>
    </section>

    <div class="helpdesk-layout">

        
        <div class="helpdesk-left">

           
            <section class="helpdesk-section">
                <h2><i class="fas fa-search"></i> Search for Help</h2>
                <div class="search-box">
                    <input type="text" id="faqSearch" placeholder="Search topics e.g. returns, delivery, payment...">
                    <span class="search-icon">🔎</span>
                </div>
                <div id="searchResults" class="search-results" style="display:none;"></div>
            </section>

            
            <section class="helpdesk-section">
                <h2><i class="fas fa-question-circle"></i> Frequently Asked Questions</h2>

                <div class="faq-category" data-category="orders">
                    <div class="faq-category-title"><i class="fas fa-box"></i> Orders & Shipping</div>
                    <div class="faq-list">
                        <div class="faq-item">
                            <button class="faq-question">How long does delivery take?</button>
                            <div class="faq-answer">Standard UK delivery takes 1–3 working days. Orders placed before 2pm are usually dispatched the same day. Free shipping is available on orders over £50.</div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question">How do I track my order?</button>
                            <div class="faq-answer">Once logged in, go to Order History in the User menu. All your past and current orders are listed there with their status and details.</div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question">Can I change or cancel my order?</button>
                            <div class="faq-answer">Orders can be modified or cancelled within 1 hour of placement. After that, please contact us via this Help Desk and we'll do our best to assist.</div>
                        </div>
                    </div>
                </div>

                <div class="faq-category" data-category="returns">
                    <div class="faq-category-title"><i class="fas fa-undo"></i> Returns & Refunds</div>
                    <div class="faq-list">
                        <div class="faq-item">
                            <button class="faq-question">What is your returns policy?</button>
                            <div class="faq-answer">We offer a 30-day returns policy. Items must be returned in their original condition and packaging. Refunds are processed within 5–7 working days of receiving the return.</div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question">How do I return a faulty item?</button>
                            <div class="faq-answer">Contact us via the feedback form below with your order number and a description of the fault. We will arrange a free return and replacement or full refund.</div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question">When will I receive my refund?</button>
                            <div class="faq-answer">Refunds are typically processed within 5–7 working days after we receive your returned item. You will receive an email confirmation once processed.</div>
                        </div>
                    </div>
                </div>

                <div class="faq-category" data-category="payments">
                    <div class="faq-category-title"><i class="fas fa-credit-card"></i> Payments</div>
                    <div class="faq-list">
                        <div class="faq-item">
                            <button class="faq-question">What payment methods do you accept?</button>
                            <div class="faq-answer">We accept all major credit and debit cards, PayPal, and bank transfers. All transactions are encrypted and processed securely.</div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question">Is my payment information safe?</button>
                            <div class="faq-answer">Yes. We use industry-standard SSL encryption for all transactions. We do not store your card details on our servers.</div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question">Why was my payment declined?</button>
                            <div class="faq-answer">Payments can be declined for several reasons — insufficient funds, incorrect card details, or your bank blocking the transaction. Please check your details or contact your bank. If the issue persists, contact us.</div>
                        </div>
                    </div>
                </div>

                <div class="faq-category" data-category="technical">
                    <div class="faq-category-title"><i class="fas fa-wrench"></i> Technical Issues</div>
                    <div class="faq-list">
                        <div class="faq-item">
                            <button class="faq-question">I can't log in to my account.</button>
                            <div class="faq-answer">Try resetting your password using the "Forgot password?" link on the login page. If you still can't access your account, contact us with your registered email address.</div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question">My cart is not saving items.</button>
                            <div class="faq-answer">You must be logged in for cart items to be saved. Please log in or register and try adding items again. If the problem persists, clear your browser cache and retry.</div>
                        </div>
                        <div class="faq-item">
                            <button class="faq-question">A product page is showing an error.</button>
                            <div class="faq-answer">Please report the issue using the feedback form below, including the product name and a screenshot if possible. Our team will investigate and resolve it promptly.</div>
                        </div>
                    </div>
                </div>

            </section>

        </div>

        
        <div class="helpdesk-right">

            
            <section class="helpdesk-section">
                <h2><i class="fas fa-headset"></i> Contact Methods</h2>
                <div class="contact-methods">
                    <div class="contact-method-card">
                        <div class="contact-method-icon"></div>
                        <div>
                            <div class="contact-method-title">Email</div>
                            <div class="contact-method-value">E-Quipment123@gmail.com</div>
                            <div class="contact-method-response">Response within 24 hours</div>
                        </div>
                    </div>
                    <div class="contact-method-card">
                        <div class="contact-method-icon"></div>
                        <div>
                            <div class="contact-method-title">Live Chat</div>
                            <div class="contact-method-value">Available via the chat widget</div>
                            <div class="contact-method-response">Instant AI-powered responses</div>
                        </div>
                    </div>
                    <div class="contact-method-card">
                        <div class="contact-method-icon"></div>
                        <div>
                            <div class="contact-method-title">Feedback Form</div>
                            <div class="contact-method-value">Submit below</div>
                            <div class="contact-method-response">Response within 48 hours</div>
                        </div>
                    </div>
                </div>
            </section>

            
            <section class="helpdesk-section">
                <h2> Submit a Request</h2>

                @if(session('success'))
                    <div class="helpdesk-success">
                        <div class="success-icon">✅</div>
                        <div>
                            <strong>Request received!</strong><br>
                            Your reference number is <strong>{{ session('reference') }}</strong>. Please save this for tracking purposes. We'll respond within 48 hours.
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="helpdesk-errors">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('helpdesk.submit') }}" method="POST" class="helpdesk-form">
                    @csrf

                    <div class="form-row">
                        <div class="hd-form-group">
                            <label>Name <span class="optional">(Optional)</span></label>
                            <input type="text" name="name" placeholder="Your name" value="{{ old('name') }}">
                        </div>
                        <div class="hd-form-group">
                            <label>Email <span class="required">*</span></label>
                            <input type="email" name="email" placeholder="your@email.com"
                                   value="{{ old('email', auth()->user()->email ?? '') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="hd-form-group">
                            <label>Category <span class="required">*</span></label>
                            <select name="category" required>
                                <option value="">Select a category...</option>
                                <option value="Bug Report" {{ old('category') == 'Bug Report' ? 'selected' : '' }}> Bug Report</option>
                                <option value="Order Issue" {{ old('category') == 'Order Issue' ? 'selected' : '' }}> Order Issue</option>
                                <option value="Return Request" {{ old('category') == 'Return Request' ? 'selected' : '' }}> Return Request</option>
                                <option value="Payment Issue" {{ old('category') == 'Payment Issue' ? 'selected' : '' }}> Payment Issue</option>
                                <option value="Suggestion" {{ old('category') == 'Suggestion' ? 'selected' : '' }}> Suggestion</option>
                                <option value="Complaint" {{ old('category') == 'Complaint' ? 'selected' : '' }}> Complaint</option>
                                <option value="General Enquiry" {{ old('category') == 'General Enquiry' ? 'selected' : '' }}> General Enquiry</option>
                            </select>
                        </div>
                        <div class="hd-form-group">
                            <label>Order Number <span class="optional">(Optional)</span></label>
                            <input type="text" name="order_number" placeholder="e.g. #42"
                                   value="{{ old('order_number') }}">
                        </div>
                    </div>

                    <div class="hd-form-group">
                        <label>Message <span class="required">*</span></label>
                        <textarea name="message" rows="5"
                                  placeholder="Describe your issue or feedback in detail..." required>{{ old('message') }}</textarea>
                    </div>

                    <div class="hd-form-group">
                        <label>Satisfaction Rating <span class="optional">(Optional)</span></label>
                        <div class="star-rating">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}"
                                       {{ old('rating') == $i ? 'checked' : '' }}>
                                <label for="star{{ $i }}" title="{{ $i }} star{{ $i > 1 ? 's' : '' }}">★</label>
                            @endfor
                        </div>
                    </div>

                    <div class="privacy-notice">
                        🔒 Your data will be used solely for support purposes in accordance with our privacy policy.
                    </div>

                    <button type="submit" class="btn-primary hd-submit">Submit Request</button>
                </form>
            </section>

        </div>
    </div>

@endsection

@section('scripts')
<script>

document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', function() {
        const item = this.closest('.faq-item');
        const answer = item.querySelector('.faq-answer');
        const isOpen = item.classList.contains('open');

        
        document.querySelectorAll('.faq-item').forEach(i => {
            i.classList.remove('open');
            i.querySelector('.faq-answer').style.maxHeight = null;
        });

        
        if (!isOpen) {
            item.classList.add('open');
            answer.style.maxHeight = answer.scrollHeight + 'px';
        }
    });
});


const faqData = [];
document.querySelectorAll('.faq-item').forEach(item => {
    faqData.push({
        question: item.querySelector('.faq-question').textContent,
        answer: item.querySelector('.faq-answer').textContent,
        element: item,
    });
});

document.getElementById('faqSearch').addEventListener('input', function() {
    const query = this.value.toLowerCase().trim();
    const results = document.getElementById('searchResults');

    if (query.length < 2) {
        results.style.display = 'none';
        return;
    }

    const matches = faqData.filter(f =>
        f.question.toLowerCase().includes(query) ||
        f.answer.toLowerCase().includes(query)
    );

    if (matches.length === 0) {
        results.innerHTML = '<p class="no-results">No results found. Try different keywords or use the form below.</p>';
    } else {
        results.innerHTML = matches.map(m => `
            <div class="search-result-item">
                <div class="search-result-q">${m.question}</div>
                <div class="search-result-a">${m.answer}</div>
            </div>
        `).join('');
    }

    results.style.display = 'block';
});
</script>
@endsection