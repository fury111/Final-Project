@extends('layouts.master')

@section('title', $product->name)

@push('styles')
<style>
    .product-gallery {
        position: relative;
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }
    
    .product-main-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: slideInRight 0.8s ease forwards;
        opacity: 0;
        animation-delay: 0.2s;
    }
    
    .product-main-image:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .product-thumbnails {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.4s;
    }
    
    .product-thumb {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    
    .product-thumb::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.3s ease;
    }
    
    .product-thumb:hover::before {
        left: 100%;
    }
    
    .product-thumb:hover,
    .product-thumb.active {
        border-color: var(--dd-primary);
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .quantity-selector {
        max-width: 140px;
        animation: slideInLeft 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.6s;
    }
    
    .review-card {
        border-left: 3px solid var(--dd-primary);
        transition: all 0.3s ease;
        transform: translateX(0);
    }
    
    .review-card:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .product-info {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.3s;
    }
    
    .product-action {
        animation: bounceIn 0.8s ease forwards;
        opacity: 0;
        animation-delay: 0.7s;
    }
    
    .product-features {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.8s;
    }
    
    .product-tabs {
        animation: fadeIn 0.6s ease forwards;
        opacity: 0;
        animation-delay: 0.9s;
    }
    
    .related-products {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
        animation-delay: 1.0s;
    }
    
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    .bounce-animation {
        animation: bounce 1s ease infinite alternate;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes bounceIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.02); }
        100% { transform: scale(1); }
    }
    
    @keyframes bounce {
        from { transform: translateY(0px); }
        to { transform: translateY(-5px); }
    }
    
    .hover-lift {
        transition: all 0.3s ease;
    }
    
    .hover-lift:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .glow-effect {
        position: relative;
    }
    
    .glow-effect::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: inherit;
        box-shadow: inset 0 0 20px rgba(45, 90, 39, 0.1);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .glow-effect:hover::before {
        opacity: 1;
    }
    
    .scale-on-hover {
        transition: transform 0.2s ease;
    }
    
    .scale-on-hover:hover {
        transform: scale(1.05);
    }
    
    .fade-in-element {
        opacity: 0;
        animation: fadeInElement 0.6s ease forwards;
    }
    
    @keyframes fadeInElement {
        to { opacity: 1; }
    }
    
    .floating-animation {
        animation: floating 3s ease-in-out infinite;
    }
    
    @keyframes floating {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    .progress-bar-animated {
        animation: progressFill 1s ease forwards;
    }
    
    @keyframes progressFill {
        from { width: 0%; }
    }
    
    .tab-content {
        animation: fadeIn 0.5s ease forwards;
        opacity: 0;
    }
    
    .tab-pane.active .tab-content {
        opacity: 1;
    }
    
    .nav-link {
        transition: all 0.3s ease;
    }
    
    .nav-link:hover {
        transform: translateY(-2px);
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }
    
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
</style>
@endpush

@section('content')
<!-- Success/Error Messages -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show slide-in" role="alert" style="animation-delay: 0.1s;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show slide-in" role="alert" style="animation-delay: 0.2s;">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Breadcrumb -->
<div class="breadcrumb-wrapper fade-in-element" style="animation-delay: 0.1s;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="hover-lift">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category') }}" class="hover-lift">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.show', $product->category->slug ?? 'uncategorized') }}" class="hover-lift">{{ $product->category->name ?? 'Uncategorized' }}</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pb-5">
    <div class="row g-5">
        <!-- Product Gallery -->
        <div class="col-lg-6">
            <div class="product-gallery">
                <img src="{{ $product->image_path ?? 'https://placehold.co/600x450/fff3cd/2D5A27?text=' . urlencode($product->name) }}" 
                     class="product-main-image scale-on-hover" 
                     alt="{{ $product->name }}" 
                     id="mainImage">
                <div class="product-thumbnails">
                    <img src="{{ $product->image_path ?? 'https://placehold.co/150x150/fff3cd/2D5A27?text=Main' }}" 
                         class="product-thumb active scale-on-hover" 
                         alt="Main image"
                         data-image="{{ $product->image_path ?? 'https://placehold.co/600x450/fff3cd/2D5A27?text=' . urlencode($product->name) }}">
                </div>
            </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6 product-info">
            <span class="badge {{ $product->stock_quantity > 0 ? 'bg-success' : 'bg-danger' }} mb-2 pulse-animation">
                {{ $product->stock_quantity > 0 ? 'In Stock' : 'Out of Stock' }}
            </span>
            <h1 class="h2 mb-2 glow-effect">{{ $product->name }}</h1>
            <p class="text-muted mb-3">{{ Str::limit($product->description, 100) }}</p>
            
            <!-- Rating -->
            <div class="d-flex align-items-center gap-2 mb-3">
                <div class="text-warning">
                    @php
                        $avgRatingInt = (int)round($avgRating);
                    @endphp
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $avgRatingInt)
                            <i class="bi bi-star-fill"></i>
                        @else
                            <i class="bi bi-star"></i>
                        @endif
                    @endfor
                </div>
                <span class="text-muted small">({{ number_format($avgRating, 1) }}) · {{ $reviewCount }} reviews</span>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <span class="h3 fw-bold" style="color: var(--dd-primary);">${{ number_format($product->price, 2) }}</span>
                <span class="text-muted small ms-2">/ unit</span>
            </div>

            <!-- Stock Info -->
            <p class="text-muted small mb-4">
                <i class="bi bi-box-seam me-1"></i>{{ $product->stock_quantity }} items in stock
            </p>

            <!-- Quantity & Add to Cart -->
            <div class="d-flex flex-column flex-sm-row gap-3 mb-4 product-action">
                <div class="quantity-selector">
                    <label class="form-label small text-muted">Quantity</label>
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity()">
                            <i class="bi bi-dash"></i>
                        </button>
                        <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="{{ $product->stock_quantity }}">
                        <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity()">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="flex-grow-1 d-flex flex-column justify-content-end">
                    <form method="POST" action="{{ route('cart.add') }}" class="d-flex">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1" id="add-to-cart-quantity">
                        <button type="submit" class="btn btn-primary btn-lg w-100 hover-lift">
                            <i class="bi bi-cart-plus me-2"></i>Add to Cart
                        </button>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-2 mb-4">
                <a href="{{ route('checkout') }}" class="btn btn-accent flex-grow-1 hover-lift">
                    <i class="bi bi-lightning-fill me-2"></i>Buy Now
                </a>
                <a href="{{ route('wishlist') }}" class="btn btn-outline-secondary hover-lift">
                    <i class="bi bi-heart"></i>
                </a>
                <button class="btn btn-outline-secondary hover-lift" onclick="shareProduct()">
                    <i class="bi bi-share"></i>
                </button>
            </div>

            <!-- Features -->
            <div class="bg-light rounded p-3 mb-4 product-features">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2 hover-lift">
                            <i class="bi bi-truck" style="color: var(--dd-primary);"></i>
                            <span class="small">Free shipping over $50</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2 hover-lift">
                            <i class="bi bi-arrow-repeat" style="color: var(--dd-primary);"></i>
                            <span class="small">30-day returns</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2 hover-lift">
                            <i class="bi bi-shield-check" style="color: var(--dd-primary);"></i>
                            <span class="small">Quality guaranteed</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2 hover-lift">
                            <i class="bi bi-patch-check" style="color: var(--dd-primary);"></i>
                            <span class="small">Certified quality</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Tabs -->
    <section class="mt-5 product-tabs">
        <ul class="nav nav-tabs" id="productTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active hover-lift" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button">Description</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link hover-lift" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button">Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link hover-lift" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Reviews ({{ $reviewCount }})</button>
            </li>
        </ul>
        <div class="tab-content pt-4" id="productTabsContent">
            <!-- Description Tab -->
            <div class="tab-pane fade show active" id="description" role="tabpanel">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>About This Product</h5>
                        <p>{!! nl2br(e($product->description)) !!}</p>
                    </div>
                </div>
            </div>
            
            <!-- Details Tab -->
            <div class="tab-pane fade" id="details" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-striped">
                            <tbody>
                                <tr><th>Name</th><td>{{ $product->name }}</td></tr>
                                <tr><th>Price</th><td>${{ number_format($product->price, 2) }}</td></tr>
                                <tr><th>Category</th><td>{{ $product->category->name ?? 'N/A' }}</td></tr>
                                <tr><th>Stock</th><td>{{ $product->stock_quantity }}</td></tr>
                                <tr><th>Sales Count</th><td>{{ $product->sales_count }}</td></tr>
                                <tr><th>Slug</th><td>{{ $product->slug }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Reviews Tab -->
            <div class="tab-pane fade" id="reviews" role="tabpanel">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Review Summary -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4 text-center border-end">
                                        <div class="display-4 fw-bold" style="color: var(--dd-primary);">{{ number_format($avgRating, 1) }}</div>
                                        <div class="text-warning mb-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $avgRatingInt)
                                                    <i class="bi bi-star-fill"></i>
                                                @else
                                                    <i class="bi bi-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <small class="text-muted">Based on {{ $reviewCount }} reviews</small>
                                    </div>
                                    <div class="col-md-8">
                                        @php
                                            $ratingCounts = [
                                                5 => $product->reviews->where('rating', 5)->count(),
                                                4 => $product->reviews->where('rating', 4)->count(),
                                                3 => $product->reviews->where('rating', 3)->count(),
                                                2 => $product->reviews->where('rating', 2)->count(),
                                                1 => $product->reviews->where('rating', 1)->count(),
                                            ];
                                            $totalCount = $product->reviews->count();
                                        @endphp
                                        @for($star = 5; $star >= 1; $star--)
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="small" style="width: 60px;">{{ $star }} stars</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-success progress-bar-animated" style="width: {{ $totalCount > 0 ? ($ratingCounts[$star] / $totalCount) * 100 : 0 }}%;"></div>
                                            </div>
                                            <span class="small text-muted" style="width: 20px;">{{ $ratingCounts[$star] }}</span>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Individual Reviews -->
                        @forelse($product->reviews->sortByDesc('created_at') as $review)
                        <div class="review-card card mb-3 hover-lift">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <strong>{{ $review->user->name ?? 'Anonymous' }}</strong>
                                        <span class="text-warning ms-2">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <i class="bi bi-star-fill"></i>
                                                @else
                                                    <i class="bi bi-star"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    </div>
                                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-0">{{ $review->comment }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-info">No reviews yet. Be the first to review this product!</div>
                        @endforelse

                        @if($product->reviews->count() > 3)
                        <a href="#" class="btn btn-outline-primary hover-lift">Load More Reviews</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
<section class="mt-5 related-products">
    <h4 class="mb-4">You May Also Like</h4>
    <div class="row g-4">
        @foreach($relatedProducts as $relatedProduct)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 hover-lift">
                <img src="{{ $relatedProduct->image_path ?? 'https://placehold.co/200x200' }}" class="card-img-top scale-on-hover" alt="{{ $relatedProduct->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h6 class="card-title">{{ $relatedProduct->name }}</h6>
                    <p class="card-text text-muted small">{{ $relatedProduct->category->name ?? 'Uncategorized' }}</p>
                    <p class="card-text">
                        <strong>${{ number_format($relatedProduct->price, 2) }}</strong>
                    </p>
                    <a href="{{ route('product', ['slug' => $relatedProduct->slug]) }}" class="btn btn-primary btn-sm w-100 mt-2">
                        View Item
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@push('scripts')
<script>
    // Enhanced animations
    document.addEventListener('DOMContentLoaded', function() {
        // Add staggered animations to elements
        const elements = document.querySelectorAll('.fade-in-element, .slide-in, .hover-lift');
        elements.forEach((el, index) => {
            el.style.animationDelay = (index * 0.1) + 's';
        });

        // Add hover effects to thumbnails
        const thumbs = document.querySelectorAll('.product-thumb');
        thumbs.forEach(thumb => {
            thumb.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });
            thumb.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Add ripple effect to buttons
        document.querySelectorAll('button, a.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255,255,255,0.5);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                `;
                
                this.style.position = 'relative';
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add custom ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Add scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in-element, .product-info, .product-action, .product-features, .product-tabs, .related-products').forEach(el => {
            observer.observe(el);
        });
    });

    function decreaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
        updateAddToCartQuantity();
    }

    function increaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        let currentValue = parseInt(quantityInput.value);
        const maxStock = {{ $product->stock_quantity }};
        if (currentValue < maxStock) {
            quantityInput.value = currentValue + 1;
        }
        updateAddToCartQuantity();
    }

    function updateAddToCartQuantity() {
        const quantityInput = document.getElementById('quantity');
        const addToCartInput = document.getElementById('add-to-cart-quantity');
        addToCartInput.value = quantityInput.value;
    }

    function shareProduct() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $product->name }}',
                text: '{{ Str::limit($product->description, 100) }}',
                url: window.location.href
            }).catch(console.error);
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(window.location.href);
            alert('Product URL copied to clipboard!');
        }
    }

    // Initialize the add to cart quantity
    document.addEventListener('DOMContentLoaded', function() {
        updateAddToCartQuantity();
    });
</script>
@endpush
@endsection