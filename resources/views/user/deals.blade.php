@extends('layouts.master')

@section('title', 'Deals & Offers')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container text-center">
        <h1>Deals & Offers</h1>
        <p>Don't miss out on our amazing discounts!</p>
    </div>
</div>

<div class="container pb-5">
    <!-- Flash Sale Banner -->
    <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
        <i class="bi bi-lightning-charge-fill fs-4 me-3"></i>
        <div>
            <strong>Flash Sale!</strong> Ends in 23:45:12 - Up to 50% off select items
        </div>
    </div>

    <!-- Featured Deals -->
    <section class="mb-5">
        <h2 class="h4 mb-4">Today's Best Deals</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <div class="col-5">
                            <img src="https://placehold.co/300x250/fee2e2/DC3545?text=50%25+OFF  " class="img-fluid h-100 object-fit-cover" alt="Deal">
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <span class="badge bg-danger mb-2">50% OFF</span>
                                <h5 class="card-title">Vitamin C Supplements</h5>
                                <p class="text-muted small mb-2">Boost your immunity with our premium supplements</p>
                                <div class="mb-3">
                                    <span class="fs-4 fw-bold text-primary">$11.99</span>
                                    <span class="text-muted text-decoration-line-through ms-2">$23.99</span>
                                </div>
                                <a href="{{ route('product') }}" class="btn btn-primary">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <div class="col-5">
                            <img src="https://placehold.co/300x250/fef3c7/E67E22?text=40%25+OFF  " class="img-fluid h-100 object-fit-cover" alt="Deal">
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <span class="badge bg-warning text-dark mb-2">40% OFF</span>
                                <h5 class="card-title">Organic Rice 5kg</h5>
                                <p class="text-muted small mb-2">Premium quality organic rice for your family</p>
                                <div class="mb-3">
                                    <span class="fs-4 fw-bold text-primary">$8.99</span>
                                    <span class="text-muted text-decoration-line-through ms-2">$14.99</span>
                                </div>
                                <a href="{{ route('product') }}" class="btn btn-primary">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- All Sale Items -->
    <section>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0">All Sale Items</h2>
            <select class="form-select form-select-sm" style="width: auto;">
                <option>Biggest Discount</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
                <option>Newest</option>
            </select>
        </div>
        <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Vitamin C Supplements', 'price' => 11.99, 'old_price' => 23.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/fff9c4/2D5A27?text=Vitamins  ', 'slug' => 'vitamin-c-supplements', 'stock' => 12, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Organic Rice 5kg', 'price' => 8.99, 'old_price' => 14.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/f5f5f5/2D5A27?text=Rice  ', 'slug' => 'organic-rice', 'stock' => 18, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Natural Soap Set', 'price' => 18.50, 'old_price' => 24.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/e8f5e9/2D5A27?text=Soap+Set  ', 'slug' => 'natural-soap-set', 'stock' => 15, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Coffee Beans Premium', 'price' => 22.99, 'old_price' => 28.99, 'category' => 'Beverages', 'image' => 'https://placehold.co/400x300/d7ccc8/2D5A27?text=Coffee  ', 'slug' => 'coffee-beans-premium', 'stock' => 5, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Granola Bars Box', 'price' => 6.49, 'old_price' => 9.99, 'category' => 'Snacks', 'image' => 'https://placehold.co/400x300/ffecb3/2D5A27?text=Granola  ', 'slug' => 'granola-bars', 'stock' => 35, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Hand Sanitizer 3-Pack', 'price' => 5.99, 'old_price' => 8.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/e0f7fa/2D5A27?text=Sanitizer  ', 'slug' => 'hand-sanitizer', 'stock' => 60, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Shampoo Natural', 'price' => 8.99, 'old_price' => 11.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/e1f5fe/2D5A27?text=Shampoo  ', 'slug' => 'shampoo-natural', 'stock' => 28, 'sale' => true]])
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                @include('components.product-card', ['product' => ['name' => 'Almond Butter', 'price' => 9.99, 'old_price' => 14.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/ffe0b2/2D5A27?text=Almond+Butter  ', 'slug' => 'almond-butter', 'stock' => 22, 'sale' => true]])
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-5">
            @include('components.pagination')
        </div>
    </section>
</div>
@endsection