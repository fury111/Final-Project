<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\FlashSale;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
{
    // Daily earnings
    $dailyEarnings = Order::whereDate('created_at', today())
        ->where('order_status', 'delivered')
        ->sum('total_amount');
    
    // Monthly earnings
    $monthlyEarnings = Order::whereMonth('created_at', today()->month)
        ->where('order_status', 'delivered')
        ->sum('total_amount');
    
    // Orders today
    $ordersToday = Order::whereDate('created_at', today())->count();
    
    // Pending orders
    $pendingOrders = Order::where('order_status', 'pending')->count();
    
    // Recent orders (with null date check)
    $recentOrders = Order::with('user')
        ->whereNotNull('created_at') // Add this to avoid null dates
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
    
    // Top selling products
    $topSellingProducts = Product::withCount(['orderItems as order_items_count'])
        ->orderByDesc('order_items_count')
        ->take(5)
        ->get();
    
    // Active flash sales
    $activeFlashSales = FlashSale::where('is_active', true)->count();
    
    // Active coupons
    $activeCoupons = Coupon::where('is_active', true)->count();
    
    // Total users
    $totalUsers = User::count();
    
    // New users this month
    $newUsersThisMonth = User::whereMonth('created_at', today()->month)
        ->whereYear('created_at', today()->year)
        ->count();

    return view('admin.dashboard', compact(
        'dailyEarnings', 
        'monthlyEarnings', 
        'ordersToday', 
        'pendingOrders',
        'recentOrders',
        'topSellingProducts',
        'activeFlashSales',
        'activeCoupons',
        'totalUsers',
        'newUsersThisMonth'
    ));
}
}