<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ShopNow</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Inventory
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-fw fa-box"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <h6 class="collapse-header">Manage Products:</h6>
                <a class="collapse-item" href="{{ route('admin.products.create') }}">Add New Product</a>
                <a class="collapse-item" href="{{ route('admin.products.index') }}">Product List</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
            aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-fw fa-tags"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <h6 class="collapse-header">Manage Categories:</h6>
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">Categories List</a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">Add New Category</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Sales & People
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
            aria-expanded="true" aria-controls="collapseOrders">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <h6 class="collapse-header">Order Status:</h6>
                <a class="collapse-item" href="{{ route('admin.orders.index') }}">Orders</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
            aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <h6 class="collapse-header">User Roles:</h6>
                <a class="collapse-item" href="{{ route('admin.users.index') }}">Customers</a>
                <a class="collapse-item" href="{{ route('admin.users.create') }}">Create an Administrator</a>
            </div>
        </div>
    </li>

      <hr class="sidebar-divider">

<div class="sidebar-heading">
    Discounts and Promotions
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCoupons"
        aria-expanded="true" aria-controls="collapseCoupons">
        <i class="fas fa-fw fa-ticket-alt"></i>
        <span>Coupons</span>
    </a>
    <div id="collapseCoupons" class="collapse" aria-labelledby="headingCoupons" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded shadow-sm">
            <h6 class="collapse-header">Manage Offers:</h6>
            <a class="collapse-item" href="{{ route('admin.coupon.index') }}">Active Coupons</a>
            <a class="collapse-item" href="{{ route('admin.coupon.create') }}">Create New Coupon</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.promo.discounts') }}">
        <i class="fas fa-fw fa-tags"></i>
        <span>Item Discounts</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePromos"
        aria-expanded="true" aria-controls="collapsePromos">
        <i class="fas fa-fw fa-bullhorn"></i>
        <span>Campaigns</span>
    </a>
    <div id="collapsePromos" class="collapse" aria-labelledby="headingPromos" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded shadow-sm">
            <h6 class="collapse-header">Marketing:</h6>
            <a class="collapse-item" href="{{ route('admin.promo.flashsales') }}">Flash Sales</a>
            <a class="collapse-item" href="{{ route('admin.promo.index') }}">Promo Banners</a>
        </div>
    </div>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
    Ratings & Reviews
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReviews"
        aria-expanded="true" aria-controls="collapseReviews">
        <i class="fas fa-fw fa-star-half-alt"></i>
        <span>User Feedback</span>
    </a>
    <div id="collapseReviews" class="collapse" aria-labelledby="headingReviews" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded shadow-sm">
            <h6 class="collapse-header">Manage Feedback:</h6>
            <a class="collapse-item" href="{{ route('admin.promo.ratings') }}">Ratings</a>
            <a class="collapse-item" href="{{ route('admin.promo.reviews') }}">Reviews</a>
        </div>
    </div>
</li>
    

    

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>