@extends('layouts.master')

@section('title', 'Home')

@push('styles')
<style>
    /* Scroll Progress Bar */
    .scroll-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 3px;
        background: linear-gradient(90deg, #2D5A27, #E67E22);
        z-index: 1000;
        transition: width 0.1s ease;
    }

    /* Floating Cart Button */
    .floating-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background: var(--dd-primary);
        color: white;
        border: none;
        border-radius: 50%;
        z-index: 1000;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
    }

    .floating-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    }

    /* Category Card */
    .category-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid transparent;
    }

    .category-card:hover {
        transform: translateY(-5px);
        border-color: var(--dd-primary);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .category-card .category-icon-wrapper {
        background: var(--dd-secondary);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        transition: all 0.3s ease;
    }

    .category-card:hover .category-icon-wrapper {
        background: var(--dd-primary);
        color: white;
    }

    /* Product Card */
    .product-card {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .product-card .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .product-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: var(--dd-primary);
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        z-index: 10;
    }

    /* Sale Section */
    .sale-section {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
    }

    .sale-badge {
        background: linear-gradient(135deg, #dc3545, #c82333);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    /* Feature Card */
    .feature-card {
        padding: 25px 15px;
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    /* View All Button */
    .view-all-btn {
        background: var(--dd-primary);
        border-color: var(--dd-primary);
        color: white;
        padding: 8px 20px;
        border-radius: 25px;
    }

    .view-all-btn:hover {
        background: #234620;
        border-color: #234620;
        color: white;
    }

    /* Section Headers */
    .section-header {
        margin-bottom: 2rem;
    }

    .section-header h2 {
        position: relative;
        display: inline-block;
        margin-bottom: 10px;
    }

    .section-header h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: var(--dd-primary);
        border-radius: 3px;
    }

    /* Carousel Customizations */
    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: var(--dd-primary);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin: 0 10px;
    }

    .carousel-indicators [data-bs-target] {
        background-color: var(--dd-primary);
        border-radius: 50%;
        width: 12px;
        height: 12px;
    }

    .carousel-indicators .active {
        background-color: #E67E22;
    }
</style>
@endpush

@section('content')

<!-- Scroll Progress Bar -->
<div class="scroll-progress"></div>



<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-indicators">
        @foreach($carouselProducts->take(3) as $index => $product)
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" 
                class="{{ $index == 0 ? 'active' : '' }} rounded-circle"></button>
        @endforeach
    </div>
    
    <div class="carousel-inner">
        @foreach($carouselProducts->take(3) as $index => $product)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ $product->image_path ?? 'https://placehold.co/1920x500/2D5A27/ffffff?text=' . urlencode($product->name) }}" 
                 class="d-block w-100" 
                 alt="{{ $product->name }}" 
                 style="height: 500px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block">
                <span class="badge bg-primary mb-3 px-3 py-2 animate__animated animate__pulse animate__infinite">
                    Featured Product
                </span>
                <h2 class="display-4 fw-bold mb-3 animate__animated animate__fadeInUp">
                    {{ $product->name }}
                </h2>
                <p class="lead mb-4 animate__animated animate__fadeInUp">
                    {{ Str::limit($product->description, 100) }}
                </p>
                <a href="{{ route('product', $product->slug) }}" 
                   class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold animate__animated animate__bounceIn">
                    <i class="bi bi-arrow-right me-2"></i>View Product
                </a>
            </div>
        </div>
        @endforeach
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark bg-opacity-50 rounded-circle p-3"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark bg-opacity-50 rounded-circle p-3"></span>
    </button>
</div>

<div class="container py-5">
    <!-- Welcome Message -->
    @auth
    <div class="alert alert-success alert-dismissible fade show mb-5 shadow-lg" role="alert">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <i class="bi bi-person-circle fs-3"></i>
            </div>
            <div class="flex-grow-1 ms-3">
                <h5 class="alert-heading mb-2">Welcome back, {{ auth()->user()->name }}! 🎉</h5>
                <p class="mb-0">You have <strong class="text-primary">500</strong> reward points available. 
                <a href="#" class="alert-link">Redeem now</a> for exclusive discounts!</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
    @endauth

    <!-- Category Navigation Grid -->
    <section class="mb-5">
        <div class="section-header text-center">
            <h2 class="h3 fw-bold mb-3">Shop by Category</h2>
            <p class="text-muted">Browse our curated collections</p>
        </div>
        
        <div class="row g-4">
            @foreach($categories->take(5) as $category)
            <div class="col-6 col-md-4 col-lg">
                <a href="{{ route('category.show', $category->slug) }}" class="text-decoration-none">
                    <div class="category-card card text-center p-4 h-100">
                        <div class="category-icon-wrapper">
                            <i class="bi bi-basket fs-2"></i>
                        </div>
                        <h6 class="mb-0 fw-semibold text-dark">{{ $category->name }}</h6>
                        <small class="text-muted mt-1">{{ $category->product_count ?? 0 }} items</small>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h3 fw-bold mb-2">Featured Products</h2>
                <p class="text-muted mb-0">Handpicked just for you</p>
            </div>
            <a href="{{ route('category') }}" class="view-all-btn btn">
                View All <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
        
        <div class="row g-4">
            @foreach($featuredProducts as $product)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-card card h-100">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                        @if($loop->first)
                        <div class="product-badge">Featured</div>
                        @endif
                        <div class="card-img-overlay d-flex justify-content-end align-items-start p-3">
                            <button class="btn btn-light btn-sm rounded-circle shadow-sm" title="Add to Wishlist">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title fw-semibold mb-2">{{ $product['name'] }}</h6>
                        <p class="card-text text-muted small mb-3">{{ $product['category'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="text-primary fs-5">${{ number_format($product['price'], 2) }}</strong>
                            <a href="{{ route('product', ['slug' => $product['slug']]) }}" 
                               class="btn btn-primary btn-sm rounded-pill px-3">
                                View <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Best Sellers Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h3 fw-bold mb-2">Best Sellers</h2>
                <p class="text-muted mb-0">Most loved by our customers</p>
            </div>
            <a href="{{ route('category') }}" class="view-all-btn btn">
                View All <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
        
        <div class="row g-4">
            @foreach($bestSellers as $product)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-card card h-100">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="product-badge" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                            Bestseller
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            @endfor
                            <small class="text-muted ms-2">({{ rand(50, 500) }})</small>
                        </div>
                        <h6 class="card-title fw-semibold mb-2">{{ $product['name'] }}</h6>
                        <p class="card-text text-muted small mb-3">{{ $product['category'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="text-primary fs-5">${{ number_format($product['price'], 2) }}</strong>
                            <a href="{{ route('product', ['slug' => $product['slug']]) }}" 
                               class="btn btn-primary btn-sm rounded-pill px-3">
                                View <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Sale Items Section -->
    <section class="mb-5">
        <div class="sale-section p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <span class="sale-badge badge mb-3 px-3 py-2">Limited Time</span>
                    <h2 class="h3 fw-bold text-white mb-2">On Sale Now</h2>
                    <p class="text-white-75 mb-0">Don't miss these amazing deals!</p>
                </div>
                
            </div>
            
            <div class="row g-4">
                @foreach($onSale as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                            <div class="product-badge">
                                SALE
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title fw-semibold mb-2">{{ $product['name'] }}</h6>
                            <p class="card-text text-muted small mb-3">{{ $product['category'] }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong class="text-danger fs-5">${{ number_format($product['price'], 2) }}</strong>
                                    <small class="text-muted text-decoration-line-through d-block">
                                        ${{ number_format($product['old_price'] ?? $product['price'] * 1.3, 2) }}
                                    </small>
                                </div>
                                <a href="{{ route('product', ['slug' => $product['slug']]) }}" 
                                   class="btn btn-danger btn-sm rounded-pill px-3">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="mb-5">
        <div class="section-header text-center">
            <h2 class="h3 fw-bold mb-3">Why Choose Daily Dose?</h2>
            <p class="text-muted">We're committed to excellence in every aspect</p>
        </div>
        
        <div class="row g-4">
            @php
                $features = [
                    ['icon' => 'truck', 'title' => 'Fast Delivery', 'desc' => 'Same-day delivery available'],
                    ['icon' => 'shield-check', 'title' => 'Secure Payment', 'desc' => '100% secure checkout'],
                    ['icon' => 'arrow-repeat', 'title' => 'Easy Returns', 'desc' => '30-day hassle-free returns'],
                    ['icon' => 'headset', 'title' => '24/7 Support', 'desc' => 'Always here to help you']
                ];
            @endphp
            
            @foreach($features as $feature)
            <div class="col-md-3 col-6">
                <div class="feature-card text-center">
                    <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center mb-4" 
                         style="width: 80px; height: 80px;">
                        <i class="bi bi-{{ $feature['icon'] }} fs-2 text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-2">{{ $feature['title'] }}</h5>
                    <p class="text-muted small mb-0">{{ $feature['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="mb-5">
        <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 25px;">
            <div class="row g-0">
                <div class="col-md-6 position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="p-5 text-white h-100 d-flex flex-column justify-content-center">
                        <h3 class="h2 fw-bold mb-3">Stay in the Loop</h3>
                        <p class="lead opacity-90 mb-4">Subscribe to our newsletter for exclusive deals, new arrivals, and insider updates.</p>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope-fill fs-1 me-3"></i>
                            <div>
                                <h5 class="mb-1">Email Updates</h5>
                                <p class="small opacity-75 mb-0">Never miss a deal</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-5">
                        <h4 class="mb-4">Subscribe Now</h4>
                        <form class="subscribe-form">
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg rounded-pill" placeholder="Your email address" required>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletterCheck" checked>
                                    <label class="form-check-label small text-muted" for="newsletterCheck">
                                        I agree to receive marketing emails
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">
                                Subscribe <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Cart Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="cartOffcanvasLabel">Your Shopping Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="text-center py-5">
            <i class="bi bi-cart-x fs-1 text-muted mb-3"></i>
            <h6>Your cart is empty</h6>
            <p class="text-muted small">Add some items to get started</p>
            <a href="{{ route('category') }}" class="btn btn-primary mt-3">
                Start Shopping
            </a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Scroll Progress Bar
    window.addEventListener('scroll', function() {
        const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrollPercent = (scrollTop / scrollHeight) * 100;
        document.querySelector('.scroll-progress').style.width = scrollPercent + '%';
    });

    // Animate elements on scroll
    function animateOnScroll() {
        const elements = document.querySelectorAll('.category-card, .product-card, .feature-card');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementTop < windowHeight - 100) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    }

    // Set initial state for animated elements
    document.querySelectorAll('.category-card, .product-card, .feature-card').forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });

    // Run animation on load and scroll
    window.addEventListener('load', animateOnScroll);
    window.addEventListener('scroll', animateOnScroll);

    // Carousel auto-rotate with pause on hover
    const carousel = document.getElementById('heroCarousel');
    if (carousel) {
        const carouselInstance = new bootstrap.Carousel(carousel, {
            interval: 5000,
            wrap: true
        });
        
        carousel.addEventListener('mouseenter', () => {
            carouselInstance.pause();
        });
        
        carousel.addEventListener('mouseleave', () => {
            carouselInstance.cycle();
        });
    }

    // Add to cart animation
    document.querySelectorAll('.btn[href*="product"]').forEach(button => {
        button.addEventListener('click', function(e) {
            // Add click animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });

    // Newsletter form submission
    document.querySelector('.subscribe-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Show loading state
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Subscribing...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            alert('Thank you for subscribing!');
        }, 2000);
    });
</script>
@endpush