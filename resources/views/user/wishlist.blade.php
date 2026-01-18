@extends('layouts.master')

@section('title', 'My Wishlist')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Wishlist</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">My Wishlist</h1>
        <span class="text-muted">3 items</span>
    </div>

    <div class="row g-4">
        <!-- Wishlist Items -->
        <div class="col-lg-8">
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
                                    <small class="text-muted">Groceries</small>
                                    <div class="mt-1">
                                        <span class="badge bg-success">In Stock</span>
                                    </div>
                                </div>
                                <button class="btn btn-link text-danger p-0" title="Remove from wishlist">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-2">
                                <span class="fw-bold" style="color: var(--dd-primary);">$12.99</span>
                                <a href="{{ route('cart') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-cart-plus me-1"></i>Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="d-flex p-3 border-bottom">
                        <img src="https://placehold.co/100x100/d7ccc8/2D5A27?text=Coffee  " 
                             class="rounded me-3" 
                             alt="Coffee Beans Premium"
                             style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="mb-1">
                                        <a href="{{ route('product') }}" class="text-decoration-none text-dark">Coffee Beans Premium</a>
                                    </h6>
                                    <small class="text-muted">Beverages</small>
                                    <span class="badge bg-danger ms-2">SALE</span>
                                    <div class="mt-1">
                                        <span class="badge bg-warning text-dark">Low Stock</span>
                                    </div>
                                </div>
                                <button class="btn btn-link text-danger p-0" title="Remove from wishlist">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-2">
                                <div>
                                    <span class="text-muted text-decoration-line-through small">$28.99</span>
                                    <span class="fw-bold ms-1" style="color: var(--dd-primary);">$22.99</span>
                                </div>
                                <a href="{{ route('cart') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-cart-plus me-1"></i>Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="d-flex p-3">
                        <img src="https://placehold.co/100x100/ffcc80/2D5A27?text=OJ  " 
                             class="rounded me-3" 
                             alt="Orange Juice"
                             style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="mb-1">
                                        <a href="{{ route('product') }}" class="text-decoration-none text-dark">Orange Juice 1L</a>
                                    </h6>
                                    <small class="text-muted">Beverages</small>
                                    <div class="mt-1">
                                        <span class="badge bg-secondary">Out of Stock</span>
                                    </div>
                                </div>
                                <button class="btn btn-link text-danger p-0" title="Remove from wishlist">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-2">
                                <span class="fw-bold" style="color: var(--dd-primary);">$4.99</span>
                                <button class="btn btn-secondary btn-sm" disabled>
                                    <i class="bi bi-cart-plus me-1"></i>Out of Stock
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('category') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                </a>
                <a href="{{ route('cart') }}" class="btn btn-primary">
                    <i class="bi bi-cart-plus me-2"></i>Add All to Cart
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card bg-light border-0">
                <div class="card-body text-center">
                    <i class="bi bi-heart fs-1 text-danger mb-3"></i>
                    <h5>Your Wishlist</h5>
                    <p class="text-muted small">Save your favorite items and come back to them later. Items in your wishlist won't be reserved.</p>
                    <a href="{{ route('account') }}" class="btn btn-outline-primary btn-sm">View Account</a>
                </div>
            </div>

            <!-- Share Wishlist -->
            <div class="card mt-3">
                <div class="card-body">
                    <h6 class="card-title">Share Wishlist</h6>
                    <p class="text-muted small">Share your wishlist with friends and family</p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary btn-sm flex-grow-1">
                            <i class="bi bi-envelope me-1"></i>Email
                        </button>
                        <button class="btn btn-outline-secondary btn-sm flex-grow-1">
                            <i class="bi bi-link-45deg me-1"></i>Copy Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection