@extends('layouts.master')

@section('title', 'Home')

@section('content')
<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://placehold.co/1920x500/2D5A27/ffffff?text=Best+Sellers+-+Up+to+30%25+Off" class="d-block w-100" alt="Best Sellers">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4 fw-bold">Best Sellers</h2>
                <p class="lead">Shop our most popular daily essentials</p>
                <a href="/category" class="btn btn-light btn-lg px-4">Shop Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://placehold.co/1920x500/E67E22/ffffff?text=New+Arrivals" class="d-block w-100" alt="New Arrivals">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4 fw-bold">New Arrivals</h2>
                <p class="lead">Discover fresh products just added</p>
                <a href="/category" class="btn btn-light btn-lg px-4">Explore</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://placehold.co/1920x500/C0392B/ffffff?text=Flash+Sale+-+Today+Only!" class="d-block w-100" alt="Flash Sale">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4 fw-bold">Flash Sale</h2>
                <p class="lead">Limited time offers on everyday items</p>
                <a href="/deals" class="btn btn-danger btn-lg px-4">Shop Sale</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="container py-5">
    <!-- Search Bar -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="input-group input-group-lg shadow-sm">
                <select class="form-select" style="max-width: 180px;">
                    <option value="">All Categories</option>
                    <option value="groceries">Groceries</option>
                    <option value="household">Household</option>
                    <option value="personal-care">Personal Care</option>
                    <option value="beverages">Beverages</option>
                    <option value="snacks">Snacks</option>
                </select>
                <input type="text" class="form-control" placeholder="Search for products...">
                <a href="/category" class="btn btn-primary px-4">
                    <i class="bi bi-search"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Category Navigation Grid -->
    <section class="mb-5">
        <h2 class="h4 mb-4 text-center">Shop by Category</h2>
        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg">
                <a href="/category/groceries" class="text-decoration-none">
                    <div class="card text-center p-4 h-100 border-0 shadow-sm" style="transition: all 0.3s;">
                        <i class="bi bi-basket fs-1 text-primary mb-2"></i>
                        <h6 class="mb-0 text-dark">Groceries</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <a href="/category/household" class="text-decoration-none">
                    <div class="card text-center p-4 h-100 border-0 shadow-sm">
                        <i class="bi bi-house fs-1 text-primary mb-2"></i>
                        <h6 class="mb-0 text-dark">Household</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <a href="/category/personal-care" class="text-decoration-none">
                    <div class="card text-center p-4 h-100 border-0 shadow-sm">
                        <i class="bi bi-heart fs-1 text-primary mb-2"></i>
                        <h6 class="mb-0 text-dark">Personal Care</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <a href="/category/beverages" class="text-decoration-none">
                    <div class="card text-center p-4 h-100 border-0 shadow-sm">
                        <i class="bi bi-cup-straw fs-1 text-primary mb-2"></i>
                        <h6 class="mb-0 text-dark">Beverages</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg">
                <a href="/category/snacks" class="text-decoration-none">
                    <div class="card text-center p-4 h-100 border-0 shadow-sm">
                        <i class="bi bi-cookie fs-1 text-primary mb-2"></i>
                        <h6 class="mb-0 text-dark">Snacks</h6>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0">Featured Products</h2>
            <a href="/category" class="btn btn-outline-primary btn-sm">View All</a>
        </div>
        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Organic Honey', 'price' => 12.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/fff3cd/2D5A27?text=Honey', 'slug' => 'organic-honey', 'stock' => 25]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Natural Soap Set', 'price' => 18.50, 'old_price' => 24.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/e8f5e9/2D5A27?text=Soap+Set', 'slug' => 'natural-soap-set', 'stock' => 15, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Bamboo Toothbrush', 'price' => 4.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/e3f2fd/2D5A27?text=Toothbrush', 'slug' => 'bamboo-toothbrush', 'stock' => 50]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Green Tea Collection', 'price' => 15.99, 'category' => 'Beverages', 'image' => 'https://placehold.co/400x300/c8e6c9/2D5A27?text=Green+Tea', 'slug' => 'green-tea-collection', 'stock' => 8]])
            </div>
        </div>
    </section>

    <!-- Best Sellers Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0">Best Sellers</h2>
            <a href="/category" class="btn btn-outline-primary btn-sm">View All</a>
        </div>
        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Laundry Detergent', 'price' => 9.99, 'category' => 'Household', 'image' => 'https://placehold.co/400x300/bbdefb/2D5A27?text=Detergent', 'slug' => 'laundry-detergent', 'stock' => 30]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Dish Soap Bundle', 'price' => 7.50, 'category' => 'Household', 'image' => 'https://placehold.co/400x300/b2dfdb/2D5A27?text=Dish+Soap', 'slug' => 'dish-soap-bundle', 'stock' => 45]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Coffee Beans Premium', 'price' => 22.99, 'old_price' => 28.99, 'category' => 'Beverages', 'image' => 'https://placehold.co/400x300/d7ccc8/2D5A27?text=Coffee', 'slug' => 'coffee-beans-premium', 'stock' => 5, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Mixed Nuts Pack', 'price' => 14.99, 'category' => 'Snacks', 'image' => 'https://placehold.co/400x300/ffe0b2/2D5A27?text=Mixed+Nuts', 'slug' => 'mixed-nuts-pack', 'stock' => 20]])
            </div>
        </div>
    </section>

    <!-- Sale Items Section -->
    <section class="mb-5">
        <div class="p-4 p-md-5 rounded-3" style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="badge bg-danger mb-2">Limited Time</span>
                    <h2 class="h4 mb-0">On Sale Now</h2>
                </div>
                <a href="/deals" class="btn btn-danger btn-sm">Shop All Sale</a>
            </div>
            <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-3">
                    @include('components.product-card', ['product' => ['name' => 'Vitamin C Supplements', 'price' => 11.99, 'old_price' => 19.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/fff9c4/2D5A27?text=Vitamins', 'slug' => 'vitamin-c-supplements', 'stock' => 12, 'sale' => true]])
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    @include('components.product-card', ['product' => ['name' => 'Organic Rice 5kg', 'price' => 8.99, 'old_price' => 14.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/f5f5f5/2D5A27?text=Rice', 'slug' => 'organic-rice', 'stock' => 18, 'sale' => true]])
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    @include('components.product-card', ['product' => ['name' => 'Granola Bars Box', 'price' => 6.49, 'old_price' => 9.99, 'category' => 'Snacks', 'image' => 'https://placehold.co/400x300/ffecb3/2D5A27?text=Granola', 'slug' => 'granola-bars', 'stock' => 35, 'sale' => true]])
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    @include('components.product-card', ['product' => ['name' => 'Hand Sanitizer 3-Pack', 'price' => 5.99, 'old_price' => 8.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/e0f7fa/2D5A27?text=Sanitizer', 'slug' => 'hand-sanitizer', 'stock' => 60, 'sale' => true]])
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="mb-5">
        <h2 class="h4 mb-4 text-center">Why Choose Daily Dose?</h2>
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="text-center">
                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-truck fs-2 text-primary"></i>
                    </div>
                    <h6>Free Delivery</h6>
                    <p class="text-muted small mb-0">On orders over $50</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="text-center">
                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-shield-check fs-2 text-primary"></i>
                    </div>
                    <h6>Secure Payment</h6>
                    <p class="text-muted small mb-0">100% secure checkout</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="text-center">
                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-arrow-repeat fs-2 text-primary"></i>
                    </div>
                    <h6>Easy Returns</h6>
                    <p class="text-muted small mb-0">30-day return policy</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="text-center">
                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-headset fs-2 text-primary"></i>
                    </div>
                    <h6>24/7 Support</h6>
                    <p class="text-muted small mb-0">Dedicated support team</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
