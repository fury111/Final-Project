<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('user.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'items.product'])->findOrFail($id);

        // Check if user owns the order
        if ($order->user_id !== Auth::id() && !Auth::guard('admin')->check()) {
            abort(403);
        }

        return view('user.order-confirm', compact('order'));
    }
}