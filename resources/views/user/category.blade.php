@extends('layouts.master')

@section('title', 'Shop All Products')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Shop All</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container pb-5">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 mb-4">
            @include('partials.category-sidebar')
        </div>

        <!-- Product Grid -->
        <div class="col-lg-9">
            <!-- Header & Sort -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                <div>
                    <h1 class="h4 mb-1">Shop All Products</h1>
                    <p class="text-muted mb-0 small">Showing 1-12 of 48 products</p>
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <label class="text-muted small text-nowrap">Sort by:</label>
                    <select class="form-select form-select-sm" style="width: auto;">
                        <option value="newest">Newest</option>
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                        <option value="best_selling">Best Selling</option>
                        <option value="name_asc">Name: A-Z</option>
                    </select>
                    <div class="btn-group ms-2">
                        <button class="btn btn-outline-secondary btn-sm active"><i class="bi bi-grid-3x3-gap-fill"></i></button>
                        <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-list"></i></button>
                    </div>
                </div>
            </div>

            <!-- Active Filters -->
            <div class="mb-3">
                <span class="badge bg-light text-dark border me-2 px-3 py-2">
                    In Stock <button type="button" class="btn-close ms-2" style="font-size: 0.5rem;"></button>
                </span>
                <span class="badge bg-light text-dark border me-2 px-3 py-2">
                    $0 - $50 <button type="button" class="btn-close ms-2" style="font-size: 0.5rem;"></button>
                </span>
                <a href="/category" class="small text-danger">Clear All</a>
            </div>

            <!-- Product Grid -->
            <div class="row g-4">
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Organic Honey', 'price' => 12.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/fff3cd/2D5A27?text=Honey', 'slug' => 'organic-honey', 'stock' => 25]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Natural Soap Set', 'price' => 18.50, 'old_price' => 24.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/e8f5e9/2D5A27?text=Soap+Set', 'slug' => 'natural-soap-set', 'stock' => 15, 'sale' => true]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Bamboo Toothbrush', 'price' => 4.99, 'category' => 'Personal Care', 'image' => 'https://placehold.co/400x300/e3f2fd/2D5A27?text=Toothbrush', 'slug' => 'bamboo-toothbrush', 'stock' => 50]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Green Tea Collection', 'price' => 15.99, 'category' => 'Beverages', 'image' => 'https://placehold.co/400x300/c8e6c9/2D5A27?text=Green+Tea', 'slug' => 'green-tea-collection', 'stock' => 8]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Laundry Detergent', 'price' => 9.99, 'category' => 'Household', 'image' => 'https://placehold.co/400x300/bbdefb/2D5A27?text=Detergent', 'slug' => 'laundry-detergent', 'stock' => 30]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Dish Soap Bundle', 'price' => 7.50, 'category' => 'Household', 'image' => 'https://placehold.co/400x300/b2dfdb/2D5A27?text=Dish+Soap', 'slug' => 'dish-soap-bundle', 'stock' => 45]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Coffee Beans Premium', 'price' => 22.99, 'old_price' => 28.99, 'category' => 'Beverages', 'image' => 'https://placehold.co/400x300/d7ccc8/2D5A27?text=Coffee', 'slug' => 'coffee-beans-premium', 'stock' => 5, 'sale' => true]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Mixed Nuts Pack', 'price' => 14.99, 'category' => 'Snacks', 'image' => 'https://placehold.co/400x300/ffe0b2/2D5A27?text=Mixed+Nuts', 'slug' => 'mixed-nuts-pack', 'stock' => 20]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'All-Purpose Cleaner', 'price' => 5.99, 'category' => 'Household', 'image' => 'https://placehold.co/400x300/e8eaf6/2D5A27?text=Cleaner', 'slug' => 'all-purpose-cleaner', 'stock' => 40]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Facial Tissues Box', 'price' => 3.49, 'category' => 'Household', 'image' => 'https://placehold.co/400x300/fce4ec/2D5A27?text=Tissues', 'slug' => 'facial-tissues', 'stock' => 100]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Olive Oil Extra Virgin', 'price' => 16.99, 'category' => 'Groceries', 'image' => 'https://placehold.co/400x300/f0f4c3/2D5A27?text=Olive+Oil', 'slug' => 'olive-oil', 'stock' => 22]])
                </div>
                <div class="col-6 col-md-4">
                    @include('components.product-card', ['product' => ['name' => 'Orange Juice 1L', 'price' => 4.99, 'category' => 'Beverages', 'image' => 'https://placehold.co/400x300/ffcc80/2D5A27?text=OJ', 'slug' => 'orange-juice', 'stock' => 0]])
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-5">
                @include('components.pagination')
            </div>
        </div>
    </div>
</div>
@endsection
