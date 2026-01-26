<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->orderBy('created_at', 'desc')->get();
        
        // Calculate stats
        $totalOrders = $orders->count();
        $inProgressOrders = $orders->whereIn('order_status', ['pending', 'processing'])->count();
        $totalSpent = $orders->sum('total_amount');

        return view('user.orders', compact('orders', 'totalOrders', 'inProgressOrders', 'totalSpent'));
    }

    public function show($id)
    {
        $order = Auth::user()->orders()->findOrFail($id);
        return view('user.order-detail', compact('order'));
    }

    public function cancel(Request $request, $id)
{
    $order = Auth::user()->orders()->findOrFail($id);
    
    if (!in_array($order->order_status, ['pending', 'processing'])) {
        return redirect()->back()->with('error', 'Cannot cancel this order.');
    }
    
    $order->update(['order_status' => 'cancelled']);
    
    return redirect()->back()->with('success', 'Order cancelled successfully.');
}
}