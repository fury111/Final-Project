<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ItemDiscount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        $discounts = ItemDiscount::with(['product'])
            ->active()
            ->valid()
            ->get()
            ->map(function($discount) {
                $originalPrice = $discount->product->price;
                
                if ($discount->discount_type === 'percentage') {
                    $discountedPrice = $originalPrice * (1 - ($discount->discount_amount / 100));
                } else {
                    $discountedPrice = $originalPrice - $discount->discount_amount;
                }
                
                $discount->discounted_price = max(0, $discountedPrice); // Ensure no negative prices
                
                if ($discount->valid_until) {
                    $discount->days_remaining = $discount->valid_until->diffInDays(now());
                } else {
                    $discount->days_remaining = '∞'; // No expiry
                }
                
                return $discount;
            });

        return view('admin.discounts', compact('products', 'discounts'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.discountcreate', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_amount' => 'required|numeric|min:0',
            'valid_until' => 'nullable|date|after:today',
            'is_active' => 'required|boolean',
        ]);

        // Create the item discount
        $itemDiscount = ItemDiscount::create([
            'product_id' => $request->product_id,
            'discount_type' => $request->discount_type,
            'discount_amount' => $request->discount_amount,
            'valid_until' => $request->valid_until,
            'is_active' => $request->is_active,
        ]);

        // Update the product price based on the discount
        $product = Product::findOrFail($request->product_id);
        $originalPrice = $product->price;
        
        if ($request->discount_type === 'percentage') {
            $newPrice = $originalPrice * (1 - ($request->discount_amount / 100));
        } else {
            $newPrice = $originalPrice - $request->discount_amount;
        }
        
        $product->update([
            'price' => max(0, $newPrice) // Ensure no negative prices
        ]);

        return redirect()->route('admin.discounts.index')->with('success', 'Discount applied successfully!');
    }

    public function show($id)
    {
        $discount = ItemDiscount::with('product')->findOrFail($id);
        return view('admin.discountshow', compact('discount'));
    }

    public function edit($id)
    {
        $discount = ItemDiscount::findOrFail($id);
        $products = Product::all();
        return view('admin.discountedit', compact('discount', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_amount' => 'required|numeric|min:0',
            'valid_until' => 'nullable|date|after:today',
            'is_active' => 'required|boolean',
        ]);

        $itemDiscount = ItemDiscount::findOrFail($id);
        $oldProduct = $itemDiscount->product;

        // Update the discount
        $itemDiscount->update([
            'product_id' => $request->product_id,
            'discount_type' => $request->discount_type,
            'discount_amount' => $request->discount_amount,
            'valid_until' => $request->valid_until,
            'is_active' => $request->is_active,
        ]);

        // Update the old product price back to original (optional)
        $oldProduct->update(['price' => $oldProduct->original_price ?? $oldProduct->price]);

        // Update the new product price based on the discount
        $product = Product::findOrFail($request->product_id);
        $originalPrice = $product->price;
        
        if ($request->discount_type === 'percentage') {
            $newPrice = $originalPrice * (1 - ($request->discount_amount / 100));
        } else {
            $newPrice = $originalPrice - $request->discount_amount;
        }
        
        $product->update([
            'price' => max(0, $newPrice) // Ensure no negative prices
        ]);

        return redirect()->route('admin.discounts.index')->with('success', 'Discount updated successfully!');
    }

    public function destroy($id)
    {
        $itemDiscount = ItemDiscount::findOrFail($id);
        $product = $itemDiscount->product;
        
        $itemDiscount->delete();

        // Optionally restore original price when discount is removed
        // Uncomment if you want to restore original price:
        // $product->update(['price' => $product->original_price ?? $product->price]);

        return redirect()->route('admin.discounts.index')->with('success', 'Discount removed successfully!');
    }
}