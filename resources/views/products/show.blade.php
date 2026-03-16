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
</script>
@endsection