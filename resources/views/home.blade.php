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
            <img src="https://placehold.co/1920x500/2D5A27/ffffff?text=Best+Sellers+-+Up+to+30%25+Off        " class="d-block w-100" alt="Best Sellers">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4 fw-bold">Best Sellers</h2>
                <p class="lead">Shop our most popular daily essentials</p>
                <a href="{{ route('category') }}" class="btn btn-light btn-lg px-4">Shop Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://placehold.co/1920x500/E67E22/ffffff?text=New+Arrivals        " class="d-block w-100" alt="New Arrivals">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4 fw-bold">New Arrivals</h2>
                <p class="lead">Discover fresh products just added</p>
                <a href="{{ route('category') }}" class="btn btn-light btn-lg px-4">Explore</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://placehold.co/1920x500/C0392B/ffffff?text=Flash+Sale+-+Today+Only        !" class="d-block w-100" alt="Flash Sale">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4 fw-bold">Flash Sale</h2>
                <p class="lead">Limited time offers on everyday items</p>
                <a href="{{ route('deals') }}" class="btn btn-danger btn-lg px-4">Shop Sale</a>
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
    <!-- Welcome Message -->
    @auth
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            Welcome back, <strong>{{ auth()->user()->name }}!</strong> Happy shopping!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endauth

    <!-- Search Bar -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="input-group input-group-lg shadow-sm">
                <select class="form-select" style="max-width: 180px;">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" placeholder="Search for products...">
                <a href="{{ route('category') }}" class="btn btn-primary px-4">
                    <i class="bi bi-search"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Category Navigation Grid -->
    <section class="mb-5">
        <h2 class="h4 mb-4 text-center">Shop by Category</h2>
        <div class="row g-3">
            @foreach($categories->take(5) as $category)
                <div class="col-6 col-md-4 col-lg">
                    <a href="{{ route('category.show', $category->slug) }}" class="text-decoration-none">
                        <div class="card text-center p-4 h-100 border-0 shadow-sm" style="transition: all 0.3s;">
                            <i class="bi bi-basket fs-1 text-primary mb-2"></i>
                            <h6 class="mb-0 text-dark">{{ $category->name }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0">Featured Products</h2>
            <a href="{{ route('category') }}" class="btn btn-outline-primary btn-sm">View All</a>
        </div>
        <div class="row g-4">
            @foreach($featuredProducts as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="text-decoration-none">
                        @include('components.product-card', [
                            'product' => [
                                'name' => $product->name,
                                'price' => $product->price,
                                'category' => $product->category->name ?? 'Uncategorized',
                                'image' => $product->image_path,
                                'slug' => $product->slug,
                                'stock' => $product->stock_quantity,
                                'sale' => $product->flashSale ? true : false,
                                'old_price' => $product->flashSale ? $product->price * 1.2 : null
                            ]
                        ])
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Best Sellers Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0">Best Sellers</h2>
            <a href="{{ route('category') }}" class="btn btn-outline-primary btn-sm">View All</a>
        </div>
        <div class="row g-4">
            @foreach($bestSellers as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="text-decoration-none">
                        @include('components.product-card', [
                            'product' => [
                                'name' => $product->name,
                                'price' => $product->price,
                                'category' => $product->category->name ?? 'Uncategorized',
                                'image' => $product->image_path,
                                'slug' => $product->slug,
                                'stock' => $product->stock_quantity,
                                'sale' => $product->flashSale ? true : false,
                                'old_price' => $product->flashSale ? $product->price * 1.2 : null
                            ]
                        ])
                    </a>
                </div>
            @endforeach
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
                <a href="{{ route('deals') }}" class="btn btn-danger btn-sm">Shop All Sale</a>
            </div>
            <div class="row g-4">
                @foreach($onSale as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href="{{ route('product', ['slug' => $product->slug]) }}" class="text-decoration-none">
                            @include('components.product-card', [
                                'product' => [
                                    'name' => $product->name,
                                    'price' => $product->price,
                                    'category' => $product->category->name ?? 'Uncategorized',
                                    'image' => $product->image_path,
                                    'slug' => $product->slug,
                                    'stock' => $product->stock_quantity,
                                    'sale' => true,
                                    'old_price' => $product->price * 1.2
                                ]
                            ])
                        </a>
                    </div>
                @endforeach
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