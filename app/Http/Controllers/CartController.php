<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cart = $user->cart;
        $items = $cart ? $cart->items()->with('product.category')->get() : collect();
        
        $subtotal = $items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        
        $tax = $subtotal * 0.08; // 8% tax
        $total = $subtotal + $tax;
        
        return view('user.cart', compact('items', 'subtotal', 'tax', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = auth()->user();
        $cart = $user->cart;

        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock_quantity) {
            return redirect()->back()->withErrors(['quantity' => 'Not enough stock available.']);
        }

        $cartItem = CartItem::updateOrCreate(
            [
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
            ],
            [
                'quantity' => $request->quantity,
            ]
        );

        return redirect()->route('cart')->with('success', 'Item added to cart!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $item = CartItem::findOrFail($request->item_id);
        
        if ($item->cart->user_id !== auth()->id()) {
            abort(403);
        }

        $product = $item->product;
        
        if ($request->quantity > $product->stock_quantity) {
            return redirect()->back()->withErrors(['quantity' => 'Not enough stock available.']);
        }

        $item->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cart updated!');
    }

    public function remove($id)
    {
        $item = CartItem::findOrFail($id);
        
        if ($item->cart->user_id !== auth()->id()) {
            abort(403);
        }

        $item->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function clear()
    {
        $user = auth()->user();
        $cart = $user->cart;

        if ($cart) {
            $cart->items()->delete();
        }

        return redirect()->back()->with('success', 'Cart cleared.');
    }
}