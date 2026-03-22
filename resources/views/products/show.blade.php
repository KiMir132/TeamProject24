@extends('layouts.app')

@section('title', $product->Name . ' – E-Quipment')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/product-show.css') }}">
@endsection

@section('content')

    
    <div class="breadcrumb-bar">
        <div class="breadcrumb-inner">
            <a href="{{ url('/') }}">Home</a>
            <span>›</span>
            <a href="{{ route('products.index') }}">Products</a>
            <span>›</span>
            <a href="{{ route('products.search', ['type' => $product->Type]) }}">{{ $product->Type }}</a>
            <span>›</span>
            <span class="breadcrumb-current">{{ $product->Name }}</span>
        </div>
    </div>

    
    <div class="product-show-layout">

        
        <div class="product-images-col">
            <div class="product-main-image">
                 <button class="img-arrow img-arrow-left" onclick="prevImage()">&#8249;</button>
                 <img id="mainImage"
                     src="{{ asset('images/products/' . $product->ProductID . '.jpg') }}"
                     alt="{{ $product->Name }}"
                     onerror="this.src='{{ asset('images/products/placeholder.jpg') }}'">
                 <button class="img-arrow img-arrow-right" onclick="nextImage()">&#8250;</button>
            </div>
            <div class="product-thumb-row">
                @for($i = 1; $i <= 3; $i++)
                    <div class="product-thumb {{ $i === 1 ? 'active' : '' }}"
                         onclick="switchImage('{{ asset('images/products/' . $product->ProductID . '_' . $i . '.jpg') }}', this)">
                        <img src="{{ asset('images/products/' . $product->ProductID . '_' . $i . '.jpg') }}"
                             alt="{{ $product->Name }}"
                             onerror="this.parentElement.style.display='none'">
                    </div>
                @endfor
            </div>
        </div>

        
        <div class="product-details-col">

            <div class="product-show-badge">{{ $product->Type }}</div>
            <h1 class="product-show-name">{{ $product->Name }}</h1>

            <div class="product-show-price">
                £{{ number_format($product->Price, 2) }}
                <span class="product-show-price-vat">
                    (£{{ number_format($product->Price * 1.2, 2) }} inc VAT)
                </span>
            </div>

            <div class="product-show-stock {{ $product->Quantity > 10 ? 'in-stock' : ($product->Quantity > 0 ? 'low-stock' : 'out-of-stock') }}">
                @if($product->Quantity > 10)
                    ● In Stock &nbsp;·&nbsp; Estimated dispatch: 1–2 working days
                @elseif($product->Quantity > 0)
                    ● Only {{ $product->Quantity }} left in stock
                @else
                    ● Out of Stock
                @endif
            </div>

            <div class="product-show-delivery">
                🚚 <strong>Free Shipping</strong> on orders over £50 (UK Mainland)
            </div>

            <div class="product-show-description">
                {{ $product->Description }}
              @if($product->ProductID == 20)
              <div class="product-colour-picker">
                <div class="colour-picker-label">Colour</div>
                 <div class="colour-options">
                   <button class="colour-btn active" 
                    style="background:#2C2C2E;" 
                    data-colour="Space Black"
                    data-image="{{ asset('images/products/20.jpg') }}"
                    onclick="selectColour(this)">
                   </button>
                   <button class="colour-btn" 
                    style="background:#F5E6D3;" 
                    data-colour="Gold"
                    data-image="{{ asset('images/products/20_1.jpg') }}"
                    onclick="selectColour(this)">
                   </button>
                   <button class="colour-btn" 
                    style="background:#4A3728;" 
                    data-colour="Deep Purple"
                    data-image="{{ asset('images/products/20_2.jpg') }}"
                    onclick="selectColour(this)">
                   </button>
                 </div>
                <div class="selected-colour-name" id="selectedColour">Space Black</div>
            </div>
            @endif
            @if($product->ProductID == 21)
              <div class="product-colour-picker">
                <div class="colour-picker-label">Colour</div>
                <div class="colour-options">
                  <button class="colour-btn active"
                    style="background:#1C1C1C;"
                    data-colour="Phantom Black"
                    data-image="{{ asset('images/products/21.jpg') }}"
                    onclick="selectColour(this)">
                  </button>
                  <button class="colour-btn"
                    style="background:#F5F0E8;"
                    data-colour="Cream"
                    data-image="{{ asset('images/products/21_1.jpg') }}"
                    onclick="selectColour(this)">
                  </button>
               </div>
              <div class="selected-colour-name" id="selectedColour">Phantom Black</div>
          </div>
        @endif

       @if($product->ProductID == 22)
        <div class="product-colour-picker">
        <div class="colour-picker-label">Colour</div>
        <div class="colour-options">
            <button class="colour-btn active"
                    style="background:#1A1A1A;"
                    data-colour="Obsidian"
                    data-image="{{ asset('images/products/22.jpg') }}"
                    onclick="selectColour(this)">
            </button>
            <button class="colour-btn"
                    style="background:#8BB8C8;"
                    data-colour="Bay"
                    data-image="{{ asset('images/products/22_1.jpg') }}"
                    onclick="selectColour(this)">
            </button>
        </div>
        <div class="selected-colour-name" id="selectedColour">Obsidian</div>
    </div>
    @endif

    @if($product->ProductID == 23)
    <div class="product-colour-picker">
        <div class="colour-picker-label">Colour</div>
        <div class="colour-options">
            <button class="colour-btn active"
                    style="background:#2C2C2C;"
                    data-colour="Titan Black"
                    data-image="{{ asset('images/products/23.jpg') }}"
                    onclick="selectColour(this)">
            </button>
            <button class="colour-btn"
                    style="background:#2D5A3D;"
                    data-colour="Eternal Green"
                    data-image="{{ asset('images/products/23_1.jpg') }}"
                    onclick="selectColour(this)">
            </button>
        </div>
        <div class="selected-colour-name" id="selectedColour">Titan Black</div>
    </div>
    @endif

    @if($product->ProductID == 24)
    <div class="product-colour-picker">
        <div class="colour-picker-label">Colour</div>
        <div class="colour-options">
            <button class="colour-btn active"
                    style="background:#1C1C1C;"
                    data-colour="Midnight Black"
                    data-image="{{ asset('images/products/24.jpg') }}"
                    onclick="selectColour(this)">
            </button>
            <button class="colour-btn"
                    style="background:#87CEEB;"
                    data-colour="Sky Blue"
                    data-image="{{ asset('images/products/24_1.jpg') }}"
                    onclick="selectColour(this)">
            </button>
        </div>
        <div class="selected-colour-name" id="selectedColour">Midnight Black</div>
    </div>
    @endif
            </div>

            <div class="product-show-specs">
                <div class="spec-row"><span>Category</span><span>{{ $product->Type }}</span></div>
                <div class="spec-row"><span>Price excl. VAT</span><span>£{{ number_format($product->Price, 2) }}</span></div>
                <div class="spec-row"><span>Price incl. VAT</span><span>£{{ number_format($product->Price * 1.2, 2) }}</span></div>
                <div class="spec-row"><span>Availability</span>
                    <span>{{ $product->Quantity > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                </div>
            </div>

            @if($product->Quantity > 0)
                @auth
                    <form method="POST" action="{{ route('cart.add', $product->ProductID) }}">
                        @csrf
                        <button type="submit" class="btn-add-to-cart">ADD TO CART</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-add-to-cart">LOG IN TO PURCHASE</a>
                @endauth
            @else
                <button class="btn-add-to-cart disabled" disabled>OUT OF STOCK</button>
            @endif


        </div>
    </div>

   
    @if($related->count())
        <div class="related-section">
            <div class="related-inner">
                <h2>More {{ $product->Type }}s</h2>
                <div class="related-grid">
                    @foreach($related as $rel)
                        <a href="{{ route('products.show', $rel->ProductID) }}" class="related-card">
                            <div class="related-card-img">
                                <img src="{{ asset('images/products/' . $rel->ProductID . '.jpg') }}"
                                     alt="{{ $rel->Name }}"
                                     onerror="this.src='{{ asset('images/products/placeholder.jpg') }}'">
                            </div>
                            <div class="related-card-info">
                                <div class="related-card-name">{{ $rel->Name }}</div>
                                <div class="related-card-price">£{{ number_format($rel->Price, 2) }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="product-reviews-section">
    <div class="product-reviews-inner">

        @auth
            <div class="review-form-section">
                <h3>Leave a review</h3>

                @if(session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('reviews.store', $product->ProductID) }}">
                    @csrf

                    <div class="form-group">
                        <label for="Rating">Rating</label>
                        <select name="Rating" id="Rating" required>
                            <option value="">Choose rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Description">Review</label>
                        <textarea name="Description" id="Description" rows="4" placeholder="Write your review"></textarea>
                    </div>

                    <button type="submit" class="submit-review-btn">Submit Review</button>
                </form>
            </div>
        @else
            <p><a href="{{ route('login') }}">Log In</a> to leave a review</p>
        @endauth

        <h2>Customer Reviews</h2>

        <div class="reviews-summary">
            <strong>{{ $averageRating }}/5</strong>
            <span>({{ $reviewCount }} {{ $reviewCount === 1 ? 'review' : 'reviews' }})</span>
        </div>

        @forelse($product->reviews as $review)
            <div class="review-card">
                <div class="review-header">
                    <strong>{{ $review->user->name ?? 'Anonymous User' }}</strong>
                    <span>{{ rtrim(rtrim(number_format($review->Rating, 1), '0'), '.') }}/5</span>
                </div>

                <div class="review-body">
                    {{ $review->Description }}
                </div>

                <div class="review-date">
                    {{ $review->created_at->format('d M Y') }}
                </div>
            </div>
        @empty
            <p>No reviews yet for this product.</p>
        @endforelse

    </div>
</div>

@endsection

@section('scripts')
<script>
const images = [
    "{{ asset('images/products/' . $product->ProductID . '.jpg') }}",
    "{{ asset('images/products/' . $product->ProductID . '_1.jpg') }}",
    "{{ asset('images/products/' . $product->ProductID . '_2.jpg') }}",
    "{{ asset('images/products/' . $product->ProductID . '_3.jpg') }}",
];

let current = 0;

function showImage(index) {
    document.getElementById('mainImage').src = images[index];
    document.querySelectorAll('.product-thumb').forEach((t, i) => {
        t.classList.toggle('active', i === index);
    });
}

function nextImage() {
    current = (current + 1) % images.length;
    showImage(current);
}

function prevImage() {
    current = (current - 1 + images.length) % images.length;
    showImage(current);
}

function switchImage(src, el) {
    document.getElementById('mainImage').src = src;
    document.querySelectorAll('.product-thumb').forEach(t => t.classList.remove('active'));
    el.classList.add('active');
    current = Array.from(document.querySelectorAll('.product-thumb')).indexOf(el) + 1;
}

function selectColour(el) {
    document.querySelectorAll('.colour-btn').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('selectedColour').textContent = el.dataset.colour;
    document.getElementById('mainImage').src = el.dataset.image;
}
</script>
@endsection