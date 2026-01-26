<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getOrCreateCart();
        $items = $cart->items()->with('product.category')->get();
        
        // Calculate totals
        $subtotal = $items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        
        $taxRate = 0.08; // 8% tax rate
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;

        // Get any applied coupon from session
        $appliedCoupon = session('applied_coupon');
        $discountAmount = 0;
        $discountPercentage = 0;

        if ($appliedCoupon) {
            $coupon = Coupon::where('code', $appliedCoupon)
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
                // Remove invalid coupon from session
                session()->forget('applied_coupon');
                $appliedCoupon = null;
            }
        }

        $finalTotal = $subtotal - $discountAmount + $tax;

        return view('user.cart', compact('items', 'subtotal', 'tax', 'total', 'discountAmount', 'discountPercentage', 'appliedCoupon', 'finalTotal'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:999',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = $this->getOrCreateCart();

        // Check if item already exists in cart
        $existingItem = $cart->items()->where('product_id', $product->id)->first();

        if ($existingItem) {
            // Update quantity if within stock limit
            $newQuantity = $existingItem->quantity + $request->quantity;
            if ($newQuantity > $product->stock_quantity) {
                return back()->with('error', 'Requested quantity exceeds available stock.');
            }
            $existingItem->update(['quantity' => $newQuantity]);
        } else {
            // Check if requested quantity is available
            if ($request->quantity > $product->stock_quantity) {
                return back()->with('error', 'Requested quantity exceeds available stock.');
            }
            // Create new cart item
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return back()->with('success', 'Item added to cart successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1|max:999',
        ]);

        $cartItem = CartItem::findOrFail($request->item_id);
        
        // Check if user owns the cart
        if ($cartItem->cart->user_id !== Auth::id() && $cartItem->cart->session_id !== session()->getId()) {
            abort(403);
        }

        // Check if requested quantity is available
        if ($request->quantity > $cartItem->product->stock_quantity) {
            return back()->with('error', 'Requested quantity exceeds available stock.');
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Cart updated successfully!');
    }

    public function remove($id)
    {
        $cartItem = CartItem::findOrFail($id);
        
        // Check if user owns the cart
        if ($cartItem->cart->user_id !== Auth::id() && $cartItem->cart->session_id !== session()->getId()) {
            abort(403);
        }

        $cartItem->delete();

        return back()->with('success', 'Item removed from cart successfully!');
    }

    public function clear()
    {
        $cart = $this->getOrCreateCart();
        $cart->items()->delete();

        // Clear any applied coupon
        session()->forget('applied_coupon');

        return back()->with('success', 'Cart cleared successfully!');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:255',
        ]);

        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('is_active', true)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$coupon) {
            return back()->with('error', 'Invalid coupon code.');
        }

        $cart = $this->getOrCreateCart();
        $items = $cart->items()->with('product')->get();
        $subtotal = $items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        if ($subtotal < $coupon->minimum_amount) {
            return back()->with('error', 'Minimum order amount not met for this coupon.');
        }

        // Store coupon in session
        session(['applied_coupon' => $request->coupon_code]);

        return back()->with('success', 'Coupon applied successfully!');
    }

    public function removeCoupon()
    {
        session()->forget('applied_coupon');
        return back()->with('success', 'Coupon removed successfully!');
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