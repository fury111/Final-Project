<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        
        // Get applied coupon from session
        $appliedCouponCode = Session::get('applied_coupon');
        $discountAmount = 0;
        $discountPercentage = 0;
        $coupon = null;

        if ($appliedCouponCode) {
            $coupon = Coupon::where('code', $appliedCouponCode)
                ->where('is_active', true)
                ->where('expires_at', '>=', now())
                ->first();
                
            if ($coupon) {
                if ($coupon->type === 'percentage') {
                    $discountPercentage = $coupon->value;
                    $discountAmount = ($subtotal * $coupon->value) / 100;
                } elseif ($coupon->type === 'fixed') {
                    $discountAmount = min($coupon->value, $subtotal);
                }
            } else {
                // Remove invalid coupon
                Session::forget('applied_coupon');
                $appliedCouponCode = null;
            }
        }

        $finalTotal = $subtotal - $discountAmount + $tax;

        return view('user.checkout', compact(
            'items',
            'addresses',
            'subtotal',
            'tax',
            'finalTotal',
            'discountAmount',
            'discountPercentage',
            'appliedCouponCode',
            'coupon'
        ));
    }

    public function store(Request $request)
    {
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

        // Get address details
        $address = Address::where('user_id', Auth::id())->findOrFail($request->address_id);

        // Calculate total including tax
        $subtotal = $items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        
        $taxRate = 0.08;
        $tax = $subtotal * $taxRate;
        
        // Apply coupon if exists
        $appliedCouponCode = Session::get('applied_coupon');
        $discountAmount = 0;
        
        if ($appliedCouponCode) {
            $coupon = Coupon::where('code', $appliedCouponCode)->first();
            if ($coupon) {
                if ($coupon->type === 'percentage') {
                    $discountAmount = ($subtotal * $coupon->value) / 100;
                } elseif ($coupon->type === 'fixed') {
                    $discountAmount = min($coupon->value, $subtotal);
                }
            }
        }

        $total = $subtotal - $discountAmount + $tax;

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'address_id' => $address->id,
            'order_status' => 'pending',
            'total_amount' => $total,
            'first_name' => $address->full_name,
            'last_name' => '',
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone ?? '',
            'street_address' => $address->address_line1,
            'address_line2' => $address->address_line2,
            'city' => $address->city,
            'state' => $address->state,
            'zip_code' => $address->postal_code,
            'country' => $address->country,
            'shipping_method' => $request->shipping_method,
            'payment_method' => $request->payment_method,
            'coupon_code' => $appliedCouponCode,
            'discount_amount' => $discountAmount,
        ]);

        // Create order items and update stock
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);

            // Update product stock
            $product = $item->product;
            $product->decrement('stock_quantity', $item->quantity);
        }

        // Clear cart
        $cart->items()->delete();

        // Clear coupon from session
        Session::forget('applied_coupon');

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