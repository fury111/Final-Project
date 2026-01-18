@extends('layouts.master')

@section('title', 'Shopping Cart')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Shopping Cart</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pb-5">
    <h1 class="h3 mb-4">Shopping Cart</h1>

    <div class="row g-4">
        <!-- Cart Items -->
        <div class="col-lg-8">
            <!-- Cart Items List -->
            <div class="card">
                <div class="card-body p-0">
                    <!-- Item 1 -->
                    <div class="d-flex p-3 border-bottom">
                        <img src="https://placehold.co/100x100/fff3cd/2D5A27?text=Honey  " 
                             class="rounded me-3" 
                             alt="Organic Honey"
                             style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="mb-1">
                                        <a href="{{ route('product') }}" class="text-decoration-none text-dark">Organic Honey</a>
                                    </h6>
                                    <small class="text-muted">500g jar</small>
                                </div>
                                <button class="btn btn-link text-danger p-0" title="Remove item">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-2">
                                <div class="input-group" style="max-width: 120px;">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="form-control form-control-sm text-center" value="2" min="1">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <span class="fw-bold" style="color: var(--dd-primary);">$25.98</span>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="d-flex p-3 border-bottom">
                        <img src="https://placehold.co/100x100/e8f5e9/2D5A27?text=Soap  " 
                             class="rounded me-3" 
                             alt="Natural Soap Set"
                             style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="mb-1">
                                        <a href="{{ route('product') }}" class="text-decoration-none text-dark">Natural Soap Set</a>
                                    </h6>
                                    <small class="text-muted">3-piece set</small>
                                    <span class="badge bg-danger ms-2">SALE</span>
                                </div>
                                <button class="btn btn-link text-danger p-0" title="Remove item">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-2">
                                <div class="input-group" style="max-width: 120px;">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="form-control form-control-sm text-center" value="1" min="1">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <div class="text-end">
                                    <span class="text-muted text-decoration-line-through small">$24.99</span>
                                    <span class="fw-bold ms-1" style="color: var(--dd-primary);">$18.50</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="d-flex p-3 border-bottom">
                        <img src="https://placehold.co/100x100/c8e6c9/2D5A27?text=Tea  " 
                             class="rounded me-3" 
                             alt="Green Tea Collection"
                             style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="mb-1">
                                        <a href="{{ route('product') }}" class="text-decoration-none text-dark">Green Tea Collection</a>
                                    </h6>
                                    <small class="text-muted">20 tea bags</small>
                                </div>
                                <button class="btn btn-link text-danger p-0" title="Remove item">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-2">
                                <div class="input-group" style="max-width: 120px;">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="form-control form-control-sm text-center" value="1" min="1">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <span class="fw-bold" style="color: var(--dd-primary);">$15.99</span>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="d-flex p-3">
                        <img src="https://placehold.co/100x100/bbdefb/2D5A27?text=Detergent  " 
                             class="rounded me-3" 
                             alt="Laundry Detergent"
                             style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="mb-1">
                                        <a href="{{ route('product') }}" class="text-decoration-none text-dark">Laundry Detergent</a>
                                    </h6>
                                    <small class="text-muted">2L bottle</small>
                                </div>
                                <button class="btn btn-link text-danger p-0" title="Remove item">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-2">
                                <div class="input-group" style="max-width: 120px;">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="form-control form-control-sm text-center" value="1" min="1">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                <span class="fw-bold" style="color: var(--dd-primary);">$9.99</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Continue Shopping -->
            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('category') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                </a>
                <button class="btn btn-outline-danger">
                    <i class="bi bi-trash me-2"></i>Clear Cart
                </button>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Order Summary</h5>
                    
                    <!-- Coupon Code -->
                    <div class="mb-4">
                        <label class="form-label small text-muted">Coupon Code</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter code">
                            <button class="btn btn-outline-primary" type="button">Apply</button>
                        </div>
                    </div>

                    <!-- Totals -->
                    <div class="border-top pt-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal (5 items)</span>
                            <span>$70.46</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Discount</span>
                            <span class="text-success">-$6.49</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Shipping</span>
                            <span class="text-success">Free</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Tax (estimated)</span>
                            <span>$5.12</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <strong>Total</strong>
                            <strong class="fs-4" style="color: var(--dd-primary);">$69.09</strong>
                        </div>

                        <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg w-100">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Security Badge -->
            <div class="text-center mt-3">
                <small class="text-muted">
                    <i class="bi bi-shield-lock me-1"></i>Secure checkout
                </small>
                <div class="mt-2">
                    <img src="https://placehold.co/200x30/f5f5f5/999999?text=Payment+Methods  " alt="Payment methods" class="img-fluid">
                </div>
            </div>

            <!-- Promo Banner -->
            <div class="card mt-3 bg-light border-0">
                <div class="card-body text-center">
                    <i class="bi bi-truck fs-3 text-primary"></i>
                    <p class="mb-0 mt-2 small"><strong>Free shipping</strong> on orders over $50!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- You May Also Like -->
    <section class="mt-5">
        <h4 class="mb-4">You May Also Like</h4>
        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Olive Oil Extra Virgin', 'price' => 16.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/f0f4c3/2D5A27?text=Olive+Oil  ', 'slug' => 'olive-oil', 'stock' => 22]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Bamboo Toothbrush', 'price' => 4.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/e3f2fd/2D5A27?text=Toothbrush  ', 'slug' => 'bamboo-toothbrush', 'stock' => 50]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Coffee Beans Premium', 'price' => 22.99, 'old_price' => 28.99, 'category' => 'Beverages', 'image' => 'https://placehold.co/400x300/d7ccc8/2D5A27?text=Coffee  ', 'slug' => 'coffee-beans-premium', 'stock' => 5, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Mixed Nuts Pack', 'price' => 14.99, 'category' => 'Snacks', 'image' => 'https://placehold.co/400x300/ffe0b2/2D5A27?text=Mixed+Nuts  ', 'slug' => 'mixed-nuts-pack', 'stock' => 20]])
            </div>
        </div>
    </section>
</div>
@endsection