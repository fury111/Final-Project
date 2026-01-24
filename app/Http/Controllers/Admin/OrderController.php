<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\FlashSale;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        // Get all orders with user and items
        $orders = Order::with(['user', 'items'])->orderBy('created_at', 'desc')->get();
        $pendingOrdersCount = Order::where('order_status', 'pending')->count();
        
        return view('admin.orders', compact('orders', 'pendingOrdersCount'));
    }

    public function dashboard()
    {
        // Daily earnings - only delivered orders
        $dailyEarnings = Order::whereDate('created_at', today())
            ->where('order_status', 'delivered')
            ->sum('total_amount');
        
        // Monthly earnings - only delivered orders
        $monthlyEarnings = Order::whereMonth('created_at', today()->month)
            ->whereYear('created_at', today()->year)
            ->where('order_status', 'delivered')
            ->sum('total_amount');
        
        // Orders today - all orders (regardless of status)
        $ordersToday = Order::whereDate('created_at', today())->count();
        
        // Pending orders - only pending orders
        $pendingOrders = Order::where('order_status', 'pending')->count();
        
        // Recent orders - with null date check
        $recentOrders = Order::with('user')
            ->whereNotNull('created_at') // Add this to filter out null dates
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

    public function show($id)
    {
        $order = Order::with(['user', 'address', 'items'])->findOrFail($id);
        return view('admin.ordershow', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::with(['user', 'address', 'items'])->findOrFail($id);
        return view('admin.orderedit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required|in:pending,delivered,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $oldStatus = $order->order_status; // Store old status
        
        $order->update($request->only(['order_status']));
        
        // Update related data if status changed
        if ($oldStatus !== $order->order_status) {
            $this->handleStatusChange($order, $oldStatus);
        }

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully!');
    }

    private function handleStatusChange($order, $oldStatus)
    {
        // If order became delivered, update product sales counts
        if ($order->order_status === 'delivered' && $oldStatus !== 'delivered') {
            foreach ($order->items as $item) {
                $product = $item->product;
                $product->increment('sales_count', $item->quantity);
            }
        }
        
        // If order was cancelled, revert sales counts if needed
        if ($order->order_status === 'cancelled' && $oldStatus === 'delivered') {
            foreach ($order->items as $item) {
                $product = $item->product;
                $product->decrement('sales_count', $item->quantity);
            }
        }
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }
}