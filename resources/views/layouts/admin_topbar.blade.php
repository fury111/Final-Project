<header class="header">
    <!-- Top Bar -->
    <div class="top-bar bg-dark text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="top-bar-left d-flex align-items-center">
                        <span class="me-4 small">
                            <i class="fas fa-phone me-2"></i>+962 6 123 4567
                        </span>
                        <span class="small">
                            <i class="fas fa-envelope me-2"></i>info@shopmart.com
                        </span>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="top-bar-right d-flex align-items-center justify-content-end">
                        <span class="me-3 small">
                            <i class="fas fa-truck me-2"></i>Free shipping on orders $50+
                        </span>
                        @guest
                            <a href="#" class="text-white text-decoration-none me-3 small">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                            <a href="#" class="text-white text-decoration-none small">
                                <i class="fas fa-user-plus me-1"></i>Register
                            </a>
                        @else
                            <div class="dropdown">
                                <a href="#" class="text-white text-decoration-none dropdown-toggle small" id="userDropdown" data-bs-toggle="dropdown">
                                    <i class="fas fa-user me-1"></i>John Doe
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>My Account</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-box me-2"></i>My Orders</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-heart me-2"></i>Wishlist</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <div class="logo-circle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 45px; height: 45px;">
                    <i class="fas fa-store"></i>
                </div>
                <span class="fw-bold text-primary fs-4">ShopMart</span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links & Search -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <!-- Center Search Bar (Desktop) -->
                <div class="mx-auto my-3 my-lg-0" style="max-width: 500px; width: 100%;">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0" placeholder="Search products..." aria-label="Search">
                            <button class="btn btn-outline-secondary border-start-0 bg-white" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-th"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">All Categories</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Electronics</a></li>
                                <li><a class="dropdown-item" href="#">Clothing</a></li>
                                <li><a class="dropdown-item" href="#">Home & Garden</a></li>
                                <li><a class="dropdown-item" href="#">Sports</a></li>
                                <li><a class="dropdown-item" href="#">Books</a></li>
                            </ul>
                            <button class="btn btn-primary px-4" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Right Side Icons -->
                <div class="d-flex align-items-center ms-lg-3 mt-3 mt-lg-0 justify-content-around justify-content-lg-start">
                    <!-- Wishlist -->
                    <a href="#" class="btn btn-link text-dark position-relative me-3 d-flex flex-column align-items-center">
                        <i class="fas fa-heart fs-5"></i>
                        <small class="d-none d-lg-block" style="font-size: 0.7rem;">Wishlist</small>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                            3
                        </span>
                    </a>

                    <!-- Shopping Cart -->
                    <a href="#" class="btn btn-link text-dark position-relative d-flex flex-column align-items-center">
                        <i class="fas fa-shopping-cart fs-5"></i>
                        <small class="d-none d-lg-block" style="font-size: 0.7rem;">Cart</small>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary" style="font-size: 0.65rem;">
                            5
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Category Menu Bar -->
    <div class="category-bar bg-light py-2 border-top">
        <div class="container">
            <div class="d-flex align-items-center overflow-auto flex-nowrap">
                <a href="#" class="btn btn-sm btn-outline-primary me-2 text-nowrap">
                    <i class="fas fa-bars me-1"></i>All Categories
                </a>
                <a href="#" class="text-dark text-decoration-none me-3 text-nowrap">Home</a>
                <a href="#" class="text-dark text-decoration-none me-3 text-nowrap">Shop</a>
                <a href="#" class="text-dark text-decoration-none me-3 text-nowrap">
                    <span class="badge bg-danger">Deals</span>
                </a>
                <a href="#" class="text-dark text-decoration-none me-3 text-nowrap">New Arrivals</a>
                <a href="#" class="text-dark text-decoration-none me-3 text-nowrap">Best Sellers</a>
                <a href="#" class="text-dark text-decoration-none me-3 text-nowrap">About</a>
                <a href="#" class="text-dark text-decoration-none text-nowrap">Contact</a>
            </div>
        </div>
    </div>
</header>