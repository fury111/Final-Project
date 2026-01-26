<!-- Account Sidebar -->
<div class="sidebar">
    <h5 class="sidebar-title">My Account</h5>
    <a href="/account" class="sidebar-link {{ request()->is('account') ? 'active' : '' }}">
        <i class="bi bi-person"></i> Profile
    </a>
    <a href="/orders" class="sidebar-link {{ request()->is('orders*') ? 'active' : '' }}">
        <i class="bi bi-bag"></i> My Orders
    </a>
    <a href="/addresses" class="sidebar-link {{ request()->is('addresses*') ? 'active' : '' }}">
        <i class="bi bi-geo-alt"></i> Addresses
    </a>
    <a href="{{ route('logout') }}" 
   class="sidebar-link text-danger"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="bi bi-box-arrow-right"></i> Logout
</a>
</div>
