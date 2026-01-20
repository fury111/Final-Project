<!-- Main Navbar -->
<nav class="main-navbar sticky-top">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-lg-2 col-6">
                <a href="/home" class="navbar-brand">Daily<span>Dose</span></a>
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
                        <a href="#" class="nav-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/login"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a></li>
                            <li><a class="dropdown-item" href="/register"><i class="bi bi-person-plus me-2"></i>Register</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/account"><i class="bi bi-person-circle me-2"></i>My Account</a></li>
                            <li><a class="dropdown-item" href="/orders"><i class="bi bi-bag me-2"></i>My Orders</a></li>
                            <li><a class="dropdown-item" href="/wishlist"><i class="bi bi-heart me-2"></i>Wishlist</a></li>
                        </ul>
                    </div>
                    
                    <!-- Wishlist -->
                    <a href="/wishlist" class="nav-icon">
                        <i class="bi bi-heart"></i>
                        <span class="cart-badge">3</span>
                    </a>
                    
                    <!-- Cart -->
                    <a href="/cart" class="nav-icon">
                        <i class="bi bi-cart3"></i>
                        <span class="cart-badge">5</span>
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
            <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/category">Groceries</a></li>
            <li class="nav-item"><a class="nav-link" href="/category">Household</a></li>
            <li class="nav-item"><a class="nav-link" href="/category">Personal Care</a></li>
            <li class="nav-item"><a class="nav-link" href="/category">Beverages</a></li>
            <li class="nav-item"><a class="nav-link" href="/category">Snacks</a></li>
            <li class="nav-item"><a class="nav-link" href="/deals">Deals</a></li>
            <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
        </ul>
    </div>
</div>
