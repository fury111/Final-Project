<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->with('items.product')->latest()->paginate(10);
        return view('user.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('user_id', auth()->id())->with('items.product', 'address')->findOrFail($id);
        return view('user.order-detail', compact('order'));
    }
}