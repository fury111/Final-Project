<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = $this->getOrCreateCart();
        $items = $cart->items()->with('product.category')->get();
        
        if ($items->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Get user addresses
        $addresses = Address::where('user_id', Auth::id())->get();

        // Calculate totals
        $subtotal = $items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        
        $taxRate = 0.08; // 8% tax rate
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;

        return view('user.checkout', compact('items', 'addresses', 'subtotal', 'tax', 'total'));
    }

    public function store(Request $request)
    {
        Log::info('Checkout store method called', ['request' => $request->all()]);
        
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'shipping_method' => 'required|in:standard,express,overnight',
            'payment_method' => 'required|in:credit_card,paypal,cod',
        ]);

        $cart = $this->getOrCreateCart();
        $items = $cart->items()->with('product')->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Calculate total including tax
        $subtotal = $items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        $taxRate = 0.08;
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;

        Log::info('Creating order with data', [
            'user_id' => Auth::id(),
            'total_amount' => $total,
            'items_count' => $items->count()
        ]);

        // Create order - using your exact model structure
        $order = Order::create([
            'user_id' => Auth::id(),
            'address_id' => $request->address_id, // This matches your model
            'order_status' => 'pending',
            'total_amount' => $total,
        ]);

        Log::info('Order created successfully', ['order_id' => $order->id]);

        // Create order items - using your exact model structure
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price_at_time' => $item->product->price, // This matches your model
            ]);

            Log::info('Order item created', [
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity
            ]);

            // Update product stock
            $product = $item->product;
            $product->decrement('stock_quantity', $item->quantity);
            Log::info('Stock updated', [
                'product_id' => $product->id,
                'new_stock' => $product->fresh()->stock_quantity
            ]);
        }

        // Clear cart
        $cart->items()->delete();
        Log::info('Cart cleared');

        // Redirect to order confirmation
        return redirect()->route('order.confirm', $order->id)->with('success', 'Order placed successfully!');
    }

    private function getOrCreateCart()
    {
        if (Auth::check()) {
            // Authenticated user
            $cart = Cart::firstOrCreate(
                ['user_id' => Auth::id()],
                ['session_id' => session()->getId()]
            );
        } else {
            // Guest user - use session ID
            $cart = Cart::firstOrCreate(
                ['session_id' => session()->getId()],
                ['user_id' => null]
            );
        }

        return $cart;
    }
}