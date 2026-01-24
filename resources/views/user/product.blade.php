@extends('layouts.master')

@section('title', $product->name)

@push('styles')
<style>
    .product-gallery {
        position: relative;
    }
    .product-main-image {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 12px;
    }
    .product-thumbnails {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
    }
    .product-thumb {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.2s;
    }
    .product-thumb:hover,
    .product-thumb.active {
        border-color: var(--dd-primary);
    }
    .quantity-selector {
        max-width: 140px;
    }
    .review-card {
        border-left: 3px solid var(--dd-primary);
    }
</style>
@endpush

@section('content')
<!-- Success/Error Messages -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category') }}">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.show', $product->category->slug ?? 'uncategorized') }}">{{ $product->category->name ?? 'Uncategorized' }}</a></li>
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
                     class="product-main-image" 
                     alt="{{ $product->name }}" 
                     id="mainImage">
                <div class="product-thumbnails">
                    <img src="{{ $product->image_path ?? 'https://placehold.co/150x150/fff3cd/2D5A27?text=Main' }}" 
                         class="product-thumb active" 
                         alt="Main image"
                         data-image="{{ $product->image_path ?? 'https://placehold.co/600x450/fff3cd/2D5A27?text=' . urlencode($product->name) }}">
                </div>
            </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6">
            <span class="badge {{ $product->stock_quantity > 0 ? 'bg-success' : 'bg-danger' }} mb-2">
                {{ $product->stock_quantity > 0 ? 'In Stock' : 'Out of Stock' }}
            </span>
            <h1 class="h2 mb-2">{{ $product->name }}</h1>
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
            <div class="d-flex flex-column flex-sm-row gap-3 mb-4">
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
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-cart-plus me-2"></i>Add to Cart
                        </button>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-2 mb-4">
                <a href="{{ route('checkout') }}" class="btn btn-accent flex-grow-1">
                    <i class="bi bi-lightning-fill me-2"></i>Buy Now
                </a>
                <a href="{{ route('wishlist') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-heart"></i>
                </a>
                <button class="btn btn-outline-secondary" onclick="shareProduct()">
                    <i class="bi bi-share"></i>
                </button>
            </div>

            <!-- Features -->
            <div class="bg-light rounded p-3 mb-4">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-truck" style="color: var(--dd-primary);"></i>
                            <span class="small">Free shipping over $50</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-arrow-repeat" style="color: var(--dd-primary);"></i>
                            <span class="small">30-day returns</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shield-check" style="color: var(--dd-primary);"></i>
                            <span class="small">Quality guaranteed</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-patch-check" style="color: var(--dd-primary);"></i>
                            <span class="small">Certified quality</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Tabs -->
    <section class="mt-5">
        <ul class="nav nav-tabs" id="productTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button">Description</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button">Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Reviews ({{ $reviewCount }})</button>
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
                                                <div class="progress-bar bg-success" style="width: {{ $totalCount > 0 ? ($ratingCounts[$star] / $totalCount) * 100 : 0 }}%;"></div>
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
                        <div class="review-card card mb-3">
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
                        <a href="#" class="btn btn-outline-primary">Load More Reviews</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="mt-5">
        <h4 class="mb-4">You May Also Like</h4>
        <div class="row g-4">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100">
                    <img src="{{ $relatedProduct->image_path ?? 'https://placehold.co/200x200' }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $relatedProduct->name }}</h6>
                        <p class="card-text text-muted small">{{ $relatedProduct->category->name ?? 'Uncategorized' }}</p>
                        <p class="card-text">
                            <strong>${{ number_format($relatedProduct->price, 2) }}</strong>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@push('scripts')
<script>
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