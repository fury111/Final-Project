<header class="header">
    <!-- Top Bar -->
    <div class="top-bar bg-dark text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="top-bar-left">
                        <span class="me-3"><i class="fas fa-phone me-2"></i>+962 6 123 4567</span>
                        <span><i class="fas fa-envelope me-2"></i>info@yourstore.com</span>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="top-bar-right">
                        <a href="#" class="text-white text-decoration-none me-3">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                        <a href="#" class="text-white text-decoration-none">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="fas fa-store me-2"></i>ShopMart
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Electronics</a></li>
                            <li><a class="dropdown-item" href="#">Clothing</a></li>
                            <li><a class="dropdown-item" href="#">Home & Garden</a></li>
                            <li><a class="dropdown-item" href="#">Sports</a></li>
                            <li><a class="dropdown-item" href="#">Books</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <!-- Right Side Icons -->
                <div class="d-flex align-items-center">
                    <!-- Search Icon -->
                    <button class="btn btn-link text-dark me-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search"></i>
                    </button>

                    <!-- Wishlist -->
                    <a href="#" class="btn btn-link text-dark position-relative me-3">
                        <i class="fas fa-heart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </a>

                    <!-- Shopping Cart -->
                    <a href="#" class="btn btn-link text-dark position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                            5
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Search Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="GET">
                    <div class="input-group input-group-lg">
                        <input type="text" name="q" class="form-control" placeholder="Search for products..." required>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>