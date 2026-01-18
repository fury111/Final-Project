<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daily Dose - Your daily essentials store">
    <title>@yield('title', 'Daily Dose - Daily Essentials')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --dd-primary: #2D5A27;
            --dd-secondary: #F5F5DC;
            --dd-accent: #E67E22;
            --dd-dark: #1A1A1A;
            --dd-light: #FAFAFA;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--dd-light);
            color: var(--dd-dark);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--dd-primary) !important;
        }
        
        .btn-primary {
            background-color: var(--dd-primary);
            border-color: var(--dd-primary);
        }
        
        .btn-primary:hover {
            background-color: #234620;
            border-color: #234620;
        }
        
        .btn-accent {
            background-color: var(--dd-accent);
            border-color: var(--dd-accent);
            color: white;
        }
        
        .btn-accent:hover {
            background-color: #CF6E13;
            border-color: #CF6E13;
            color: white;
        }
        
        .bg-primary-custom {
            background-color: var(--dd-primary);
        }
        
        .text-primary-custom {
            color: var(--dd-primary);
        }
        
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        }
        
        .product-card .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        .stock-badge {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        
        .footer {
            background-color: var(--dd-dark);
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        .footer a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .search-form {
            max-width: 600px;
        }
        
        .category-card {
            text-align: center;
            padding: 1.5rem;
            border-radius: 12px;
            background: white;
            transition: all 0.2s;
        }
        
        .category-card:hover {
            background: var(--dd-secondary);
        }
        
        .category-card i {
            font-size: 2.5rem;
            color: var(--dd-primary);
        }
        
        .price {
            font-weight: 700;
            color: var(--dd-primary);
            font-size: 1.25rem;
        }
        
        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
        }
        
        .nav-link.active {
            color: var(--dd-primary) !important;
            font-weight: 600;
        }
        
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
        
        @media (max-width: 768px) {
            .carousel-item img {
                height: 250px;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-box-seam me-2"></i>Daily Dose
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Categories</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/category/groceries') }}">Groceries</a></li>
                            <li><a class="dropdown-item" href="{{ url('/category/household') }}">Household</a></li>
                            <li><a class="dropdown-item" href="{{ url('/category/personal-care') }}">Personal Care</a></li>
                            <li><a class="dropdown-item" href="{{ url('/category/beverages') }}">Beverages</a></li>
                            <li><a class="dropdown-item" href="{{ url('/category/snacks') }}">Snacks</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/category') }}">Shop All</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}"><i class="bi bi-person me-1"></i>Login</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i>Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ url('/orders') }}">My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endguest
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ url('/cart') }}">
                            <i class="bi bi-cart3 fs-5"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="mb-3"><i class="bi bi-box-seam me-2"></i>Daily Dose</h5>
                    <p class="text-white-50">Your trusted source for daily essentials. Quality products delivered to your doorstep.</p>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="mb-3">Shop</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/category/groceries') }}">Groceries</a></li>
                        <li class="mb-2"><a href="{{ url('/category/household') }}">Household</a></li>
                        <li class="mb-2"><a href="{{ url('/category/personal-care') }}">Personal Care</a></li>
                        <li class="mb-2"><a href="{{ url('/category/beverages') }}">Beverages</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="mb-3">Account</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/login') }}">Login</a></li>
                        <li class="mb-2"><a href="{{ url('/register') }}">Register</a></li>
                        <li class="mb-2"><a href="{{ url('/orders') }}">Orders</a></li>
                        <li class="mb-2"><a href="{{ url('/cart') }}">Cart</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3">Newsletter</h6>
                    <p class="text-white-50 small">Get updates on new products and exclusive deals.</p>
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control form-control-sm" placeholder="Your email">
                        <button type="submit" class="btn btn-accent btn-sm">Subscribe</button>
                    </form>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <small class="text-white-50">&copy; 2026 Daily Dose. All rights reserved.</small>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <a href="#" class="me-3"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-twitter-x fs-5"></i></a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Error Modal -->
    @include('components.error-modal')
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>
