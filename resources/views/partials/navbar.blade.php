<!-- Main Navbar -->
<nav class="main-navbar sticky-top">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-lg-2 col-6">
                <a href="{{ route('home') }}" class="navbar-brand">Daily<span>Dose</span></a>
            </div>
            
            <!-- Search Bar -->
            <div class="col-lg-5 d-none d-lg-block">
                <form class="search-form">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" class="form-control" placeholder="Search for products...">
                </form>
            </div>
            
            <!-- Nav Icons -->
            <div class="col-lg-5 col-6">
                <div class="d-flex align-items-center justify-content-end">
                    <!-- Mobile Search Toggle -->
                    <a href="#" class="nav-icon d-lg-none" data-bs-toggle="collapse" data-bs-target="#mobileSearch">
                        <i class="bi bi-search"></i>
                    </a>
                    
                    <!-- Account Dropdown -->
                    <div class="dropdown">
                        @auth
                            <!-- Logged In User -->
                            <a href="#" class="nav-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                <span class="d-none d-md-inline ms-1">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('account') }}"><i class="bi bi-person-circle me-2"></i>My Account</a></li>
                                <li><a class="dropdown-item" href="{{ route('orders') }}"><i class="bi bi-bag me-2"></i>My Orders</a></li>
                                <li><a class="dropdown-item" href="{{ route('wishlist') }}"><i class="bi bi-heart me-2"></i>Wishlist</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @else
                            <!-- Guest User -->
                            <a href="#" class="nav-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}"><i class="bi bi-person-plus me-2"></i>Register</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-person-circle me-2"></i>My Account</a></li>
                                <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-bag me-2"></i>My Orders</a></li>
                                <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-heart me-2"></i>Wishlist</a></li>
                            </ul>
                        @endauth
                    </div>
                    
                    <!-- Wishlist -->
                    <a href="{{ auth()->check() ? route('wishlist') : route('login') }}" class="nav-icon">
                        <i class="bi bi-heart"></i>
                        <!-- Dynamic badge count would go here if implemented -->
                    </a>
                    
                    <!-- Cart -->
                    <a href="{{ auth()->check() ? route('cart') : route('login') }}" class="nav-icon">
                        <i class="bi bi-cart3"></i>
                        <!-- Dynamic badge count would go here if implemented -->
                    </a>
                    
                    <!-- Mobile Menu Toggle -->
                    <button class="btn d-lg-none ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                        <i class="bi bi-list fs-4"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Search -->
        <div class="collapse mt-3" id="mobileSearch">
            <form class="search-form">
                <i class="bi bi-search search-icon"></i>
                <input type="text" class="form-control" placeholder="Search for products...">
            </form>
        </div>
    </div>
</nav>

<!-- Mobile Menu Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Daily<span style="color: var(--dd-accent);">Dose</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Groceries</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Household</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Personal Care</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Beverages</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Snacks</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('deals') }}">Deals</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
            
            @auth
                <li class="nav-item mt-3">
                    <div class="border-top pt-3">
                        <h6 class="text-muted small">Account</h6>
                        <a class="nav-link" href="{{ route('account') }}">My Profile</a>
                        <a class="nav-link" href="{{ route('orders') }}">My Orders</a>
                        <a class="nav-link" href="{{ route('wishlist') }}">Wishlist</a>
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
                            Logout
                        </a>
                        <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @else
                <li class="nav-item mt-3">
                    <div class="border-top pt-3">
                        <h6 class="text-muted small">Account</h6>
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
</div>