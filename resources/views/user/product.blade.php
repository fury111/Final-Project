@extends('layouts.master')

@section('title', 'Organic Honey')

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
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category') }}">Shop</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category') }}/groceries">Groceries</a></li>
                <li class="breadcrumb-item active">Organic Honey</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pb-5">
    <div class="row g-5">
        <!-- Product Gallery -->
        <div class="col-lg-6">
            <div class="product-gallery">
                <img src="https://placehold.co/600x450/fff3cd/2D5A27?text=Organic+Honey  " 
                     class="product-main-image" 
                     alt="Organic Honey" 
                     id="mainImage">
                <div class="product-thumbnails">
                    <img src="https://placehold.co/150x150/fff3cd/2D5A27?text=Front  " 
                         class="product-thumb active" 
                         alt="Front view"
                         data-image="https://placehold.co/600x450/fff3cd/2D5A27?text=Front+View  ">
                    <img src="https://placehold.co/150x150/ffecb3/2D5A27?text=Side  " 
                         class="product-thumb" 
                         alt="Side view"
                         data-image="https://placehold.co/600x450/ffecb3/2D5A27?text=Side+View  ">
                    <img src="https://placehold.co/150x150/ffe082/2D5A27?text=Back  " 
                         class="product-thumb" 
                         alt="Back view"
                         data-image="https://placehold.co/600x450/ffe082/2D5A27?text=Back+View  ">
                    <img src="https://placehold.co/150x150/ffd54f/2D5A27?text=Detail  " 
                         class="product-thumb" 
                         alt="Detail view"
                         data-image="https://placehold.co/600x450/ffd54f/2D5A27?text=Detail+View  ">
                </div>
            </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6">
            <span class="badge bg-success mb-2">In Stock</span>
            <h1 class="h2 mb-2">Organic Honey</h1>
            <p class="text-muted mb-3">Premium raw honey from local beekeepers</p>
            
            <!-- Rating -->
            <div class="d-flex align-items-center gap-2 mb-3">
                <div class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                </div>
                <span class="text-muted small">(4.5) · 24 reviews</span>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <span class="h3 fw-bold" style="color: var(--dd-primary);">$12.99</span>
                <span class="text-muted small ms-2">/ 500g jar</span>
            </div>

            <!-- Stock Info -->
            <p class="text-muted small mb-4">
                <i class="bi bi-box-seam me-1"></i>25 items in stock
            </p>

            <!-- Quantity & Add to Cart -->
            <div class="d-flex flex-column flex-sm-row gap-3 mb-4">
                <div class="quantity-selector">
                    <label class="form-label small text-muted">Quantity</label>
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-dash"></i>
                        </button>
                        <input type="number" class="form-control text-center" value="1" min="1" max="25">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="flex-grow-1 d-flex flex-column justify-content-end">
                    <a href="{{ route('cart') }}" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-cart-plus me-2"></i>Add to Cart
                    </a>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-2 mb-4">
                <a href="{{ route('checkout') }}" class="btn btn-accent flex-grow-1">
                    <i class="bi bi-lightning-fill me-2"></i>Buy Now
                </a>
                <a href="/wishlist" class="btn btn-outline-secondary">
                    <i class="bi bi-heart"></i>
                </a>
                <button class="btn btn-outline-secondary">
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
                            <span class="small">Certified organic</span>
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
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Reviews (24)</button>
            </li>
        </ul>
        <div class="tab-content pt-4" id="productTabsContent">
            <!-- Description Tab -->
            <div class="tab-pane fade show active" id="description" role="tabpanel">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>About This Product</h5>
                        <p>Our Organic Honey is sourced directly from local beekeepers who practice sustainable and ethical beekeeping. This raw, unfiltered honey retains all its natural enzymes, vitamins, and antioxidants.</p>
                        <p>Perfect for sweetening your tea, drizzling over breakfast, or using in recipes. The rich, golden color and smooth texture make it a kitchen staple for any health-conscious home.</p>
                        <h6 class="mt-4">Benefits:</h6>
                        <ul>
                            <li>100% pure and organic certified</li>
                            <li>Raw and unfiltered for maximum nutrition</li>
                            <li>Natural antibacterial properties</li>
                            <li>Rich in antioxidants</li>
                            <li>No added sugars or preservatives</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Details Tab -->
            <div class="tab-pane fade" id="details" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-striped">
                            <tbody>
                                <tr><th>Weight</th><td>500g</td></tr>
                                <tr><th>Origin</th><td>Local Farms</td></tr>
                                <tr><th>Certification</th><td>USDA Organic</td></tr>
                                <tr><th>Shelf Life</th><td>24 months</td></tr>
                                <tr><th>Storage</th><td>Cool, dry place</td></tr>
                                <tr><th>SKU</th><td>DD-HON-001</td></tr>
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
                                        <div class="display-4 fw-bold" style="color: var(--dd-primary);">4.5</div>
                                        <div class="text-warning mb-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <small class="text-muted">Based on 24 reviews</small>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="small" style="width: 60px;">5 stars</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 70%;"></div>
                                            </div>
                                            <span class="small text-muted" style="width: 20px;">17</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="small" style="width: 60px;">4 stars</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-success" style="width: 20%;"></div>
                                            </div>
                                            <span class="small text-muted" style="width: 20px;">5</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="small" style="width: 60px;">3 stars</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-warning" style="width: 8%;"></div>
                                            </div>
                                            <span class="small text-muted" style="width: 20px;">2</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="small" style="width: 60px;">2 stars</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-danger" style="width: 0%;"></div>
                                            </div>
                                            <span class="small text-muted" style="width: 20px;">0</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="small" style="width: 60px;">1 star</span>
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar bg-danger" style="width: 0%;"></div>
                                            </div>
                                            <span class="small text-muted" style="width: 20px;">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Individual Reviews -->
                        <div class="review-card card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <strong>Sarah M.</strong>
                                        <span class="text-warning ms-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </span>
                                    </div>
                                    <small class="text-muted">2 weeks ago</small>
                                </div>
                                <p class="mb-0">Absolutely love this honey! The taste is incredible and you can really tell it's pure quality. Will definitely be ordering again.</p>
                            </div>
                        </div>

                        <div class="review-card card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <strong>James K.</strong>
                                        <span class="text-warning ms-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                        </span>
                                    </div>
                                    <small class="text-muted">1 month ago</small>
                                </div>
                                <p class="mb-0">Great honey with a smooth texture. Only giving 4 stars because the jar was a bit sticky when it arrived, but the product itself is excellent.</p>
                            </div>
                        </div>

                        <div class="review-card card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <strong>Emily R.</strong>
                                        <span class="text-warning ms-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </span>
                                    </div>
                                    <small class="text-muted">1 month ago</small>
                                </div>
                                <p class="mb-0">Best honey I've ever had! I use it every morning in my tea and it makes such a difference. Supporting local beekeepers is a bonus!</p>
                            </div>
                        </div>

                        <a href="#" class="btn btn-outline-primary">Load More Reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="mt-5">
        <h4 class="mb-4">You May Also Like</h4>
        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Maple Syrup Pure', 'price' => 14.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/d7ccc8/2D5A27?text=Maple+Syrup  ', 'slug' => 'maple-syrup', 'stock' => 18]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Agave Nectar', 'price' => 9.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/c8e6c9/2D5A27?text=Agave  ', 'slug' => 'agave-nectar', 'stock' => 30]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Coconut Sugar', 'price' => 7.49, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/efebe9/2D5A27?text=Coconut+Sugar  ', 'slug' => 'coconut-sugar', 'stock' => 45]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Raw Cane Sugar', 'price' => 5.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/fff8e1/2D5A27?text=Cane+Sugar  ', 'slug' => 'raw-cane-sugar', 'stock' => 60]])
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    // Thumbnail click handler
    document.querySelectorAll('.product-thumb').forEach(thumb => {
        thumb.addEventListener('click', function() {
            document.querySelectorAll('.product-thumb').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            document.getElementById('mainImage').src = this.dataset.image;
        });
    });
</script>
@endpush
@endsection