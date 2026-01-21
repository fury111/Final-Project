<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daily Dose') - Daily Essentials Store</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --dd-primary: #2D5A27;
            --dd-primary-dark: #1E3D1A;
            --dd-secondary: #F5F5DC;
            --dd-accent: #E67E22;
            --dd-accent-hover: #D35400;
            --dd-light: #F8F9FA;
            --dd-dark: #212529;
            --dd-gray: #6C757D;
            --dd-border: #DEE2E6;
            --dd-success: #28A745;
            --dd-warning: #FFC107;
            --dd-danger: #DC3545;
        }
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: var(--dd-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Header Styles */
        .top-header {
            background-color: var(--dd-primary-dark);
            color: white;
            font-size: 0.85rem;
            padding: 8px 0;
        }
        
        .top-header a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .top-header a:hover {
            color: white;
        }
        
        /* Navbar Styles */
        .main-navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--dd-primary) !important;
        }
        
        .navbar-brand span {
            color: var(--dd-accent);
        }
        
        .nav-link {
            color: var(--dd-dark) !important;
            font-weight: 500;
            padding: 10px 15px !important;
            transition: color 0.3s;
        }
        
        .nav-link:hover {
            color: var(--dd-primary) !important;
        }
        
        .nav-link.active {
            color: var(--dd-primary) !important;
        }
        
        .search-form {
            position: relative;
            max-width: 400px;
        }
        
        .search-form .form-control {
            border-radius: 25px;
            padding-left: 45px;
            border-color: var(--dd-border);
        }
        
        .search-form .form-control:focus {
            border-color: var(--dd-primary);
            box-shadow: 0 0 0 0.2rem rgba(45, 90, 39, 0.15);
        }
        
        .search-form .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dd-gray);
        }
        
        .nav-icon {
            font-size: 1.3rem;
            color: var(--dd-dark);
            position: relative;
            padding: 8px 12px;
            transition: color 0.3s;
        }
        
        .nav-icon:hover {
            color: var(--dd-primary);
        }
        
        .cart-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: var(--dd-accent);
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 50%;
        }
        
        /* Category Navbar */
        .category-navbar {
            background-color: var(--dd-primary);
        }
        
        .category-navbar .nav-link {
            color: white !important;
            font-size: 0.9rem;
            padding: 12px 20px !important;
        }
        
        .category-navbar .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white !important;
        }
        
        .category-navbar .dropdown-menu {
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            border-radius: 8px;
        }
        
        .category-navbar .dropdown-item {
            padding: 10px 20px;
            transition: all 0.3s;
        }
        
        .category-navbar .dropdown-item:hover {
            background-color: var(--dd-secondary);
            color: var(--dd-primary);
        }
        
        /* Sidebar Styles */
        .sidebar {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px;
        }
        
        .sidebar-title {
            font-weight: 600;
            color: var(--dd-dark);
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--dd-primary);
        }
        
        .sidebar-link {
            display: block;
            padding: 10px 15px;
            color: var(--dd-dark);
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }
        
        .sidebar-link:hover, .sidebar-link.active {
            background-color: var(--dd-secondary);
            color: var(--dd-primary);
        }
        
        .sidebar-link i {
            margin-right: 10px;
            width: 20px;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px 0;
        }
        
        /* Footer Styles */
        .main-footer {
            background-color: var(--dd-dark);
            color: white;
            padding: 60px 0 30px;
            margin-top: auto;
        }
        
        .footer-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 15px;
        }
        
        .footer-brand span {
            color: var(--dd-accent);
        }
        
        .footer-text {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            line-height: 1.8;
        }
        
        .footer-title {
            font-weight: 600;
            margin-bottom: 20px;
            color: white;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--dd-accent);
        }
        
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: white;
            margin-right: 10px;
            transition: all 0.3s;
        }
        
        .footer-social a:hover {
            background-color: var(--dd-accent);
            color: white;
        }
        
        .footer-newsletter .form-control {
            background-color: rgba(255,255,255,0.1);
            border: none;
            color: white;
            padding: 12px 15px;
        }
        
        .footer-newsletter .form-control::placeholder {
            color: rgba(255,255,255,0.5);
        }
        
        .footer-newsletter .btn {
            background-color: var(--dd-accent);
            border: none;
            color: white;
            padding: 12px 25px;
        }
        
        .footer-newsletter .btn:hover {
            background-color: var(--dd-accent-hover);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 40px;
            padding-top: 20px;
        }
        
        .footer-bottom p {
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            margin: 0;
        }
        
        /* Button Styles */
        .btn-primary {
            background-color: var(--dd-primary);
            border-color: var(--dd-primary);
        }
        
        .btn-primary:hover {
            background-color: var(--dd-primary-dark);
            border-color: var(--dd-primary-dark);
        }
        
        .btn-accent {
            background-color: var(--dd-accent);
            border-color: var(--dd-accent);
            color: white;
        }
        
        .btn-accent:hover {
            background-color: var(--dd-accent-hover);
            border-color: var(--dd-accent-hover);
            color: white;
        }
        
        .btn-outline-primary {
            color: var(--dd-primary);
            border-color: var(--dd-primary);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--dd-primary);
            border-color: var(--dd-primary);
            color: white;
        }
        
        /* Card Styles */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        
        .card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        /* Product Card */
        .product-card {
            position: relative;
            overflow: hidden;
        }
        
        .product-card .product-image {
            position: relative;
            overflow: hidden;
        }
        
        .product-card .product-image img {
            transition: transform 0.3s;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.05);
        }
        
        .product-card .product-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1;
        }
        
        .product-card .product-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .product-card:hover .product-actions {
            opacity: 1;
        }
        
        .product-card .product-actions a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background-color: white;
            border-radius: 50%;
            color: var(--dd-dark);
            margin-bottom: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        
        .product-card .product-actions a:hover {
            background-color: var(--dd-primary);
            color: white;
        }
        
        .product-card .product-title {
            font-size: 1rem;
            font-weight: 500;
            color: var(--dd-dark);
            margin-bottom: 5px;
        }
        
        .product-card .product-title a {
            color: inherit;
            text-decoration: none;
        }
        
        .product-card .product-title a:hover {
            color: var(--dd-primary);
        }
        
        .product-card .product-price {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dd-primary);
        }
        
        .product-card .product-price .original-price {
            font-size: 0.9rem;
            color: var(--dd-gray);
            text-decoration: line-through;
            margin-left: 5px;
        }
        
        .product-card .product-rating {
            color: var(--dd-warning);
            font-size: 0.85rem;
        }
        
        /* Breadcrumb */
        .breadcrumb-wrapper {
            background-color: white;
            padding: 15px 0;
            margin-bottom: 20px;
        }
        
        .breadcrumb {
            margin-bottom: 0;
        }
        
        .breadcrumb-item a {
            color: var(--dd-gray);
            text-decoration: none;
        }
        
        .breadcrumb-item a:hover {
            color: var(--dd-primary);
        }
        
        .breadcrumb-item.active {
            color: var(--dd-dark);
        }
        
        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--dd-primary) 0%, var(--dd-primary-dark) 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
        }
        
        .page-header h1 {
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .page-header p {
            opacity: 0.8;
            margin-bottom: 0;
        }
        
        /* Form Styles */
        .form-control:focus, .form-select:focus {
            border-color: var(--dd-primary);
            box-shadow: 0 0 0 0.2rem rgba(45, 90, 39, 0.15);
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dd-dark);
        }
        
        /* Alert Styles */
        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            border-color: var(--dd-success);
            color: var(--dd-success);
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            border-color: var(--dd-danger);
            color: var(--dd-danger);
        }
        
        /* Table Styles */
        .table thead th {
            background-color: var(--dd-light);
            border-bottom: 2px solid var(--dd-primary);
            font-weight: 600;
        }
        
        /* Pagination */
        .pagination .page-link {
            color: var(--dd-primary);
            border-color: var(--dd-border);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--dd-primary);
            border-color: var(--dd-primary);
        }
        
        .pagination .page-link:hover {
            background-color: var(--dd-secondary);
            color: var(--dd-primary);
        }
        
        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 45px;
            height: 45px;
            background-color: var(--dd-primary);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            z-index: 1000;
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background-color: var(--dd-primary-dark);
        }
        
        @yield('styles')
    </style>
    @stack('styles')
</head>
<body>

    
    <!-- Include Navbar -->
    @include('partials.navbar')
    
    <!-- Include Category Navbar -->
    @include('partials.category-navbar')
    
    <!-- Main Content Area -->
    <main class="main-content">
        @yield('content')
    </main>
    
    <!-- Include Footer -->
    @include('partials.footer')
    
    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="bi bi-arrow-up"></i>
    </button>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
