<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlashSaleController extends Controller
{
    public function index()
    {
        $categories = Category::with('flashSale')->get();
        $globalFlashSale = FlashSale::where('is_active', true)->first(); // Global flash sale
        
        return view('admin.flashsale', compact('categories', 'globalFlashSale'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'discount_percentage' => 'required|numeric|min:0|max:100',
        ]);

        FlashSale::create([
            'product_id' => null, // For category-level flash sale
            'category_id' => $request->category_id,
            'discount_percentage' => $request->discount_percentage,
            'start_date' => now(),
            'end_date' => now()->addDays(7), // Default 7 days
            'is_active' => true,
        ]);

        // Apply discount to all products in the category
        $category = Category::find($request->category_id);
        foreach ($category->products as $product) {
            $discountedPrice = $product->price * (1 - ($request->discount_percentage / 100));
            $product->update(['price' => $discountedPrice]);
        }

        return redirect()->route('admin.flashsales.index')->with('success', 'Flash sale created successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'discount_percentage' => 'required|numeric|min:0|max:100',
        ]);

        $flashSale = FlashSale::findOrFail($id);
        $oldDiscount = $flashSale->discount_percentage;

        $flashSale->update([
            'discount_percentage' => $request->discount_percentage,
        ]);

        // Update prices for all products in the category
        if ($flashSale->category) {
            $category = $flashSale->category;
            $priceChangeMultiplier = (1 - ($oldDiscount / 100)) / (1 - ($request->discount_percentage / 100));
            
            foreach ($category->products as $product) {
                $currentDiscountedPrice = $product->price;
                $restoredPrice = $currentDiscountedPrice / (1 - ($oldDiscount / 100));
                $newDiscountedPrice = $restoredPrice * (1 - ($request->discount_percentage / 100));
                $product->update(['price' => $newDiscountedPrice]);
            }
        }

        return redirect()->route('admin.flashsales.index')->with('success', 'Flash sale updated successfully!');
    }

    public function destroy($id)
    {
        $flashSale = FlashSale::findOrFail($id);

        // Restore original prices for all products in the category
        if ($flashSale->category) {
            $category = $flashSale->category;
            foreach ($category->products as $product) {
                $currentDiscountedPrice = $product->price;
                $restoredPrice = $currentDiscountedPrice / (1 - ($flashSale->discount_percentage / 100));
                $product->update(['price' => $restoredPrice]);
            }
        }

        $flashSale->delete();

        return redirect()->route('admin.flashsales.index')->with('success', 'Flash sale removed successfully!');
    }

    public function toggleGlobal(Request $request)
{
    $request->validate([
        'is_active' => 'required|boolean', // 1 = ON, 0 = OFF
    ]);

    // Step 1: Deactivate ALL existing flash sales
    FlashSale::where('is_active', true)->update(['is_active' => false]);

    // Step 2: If turning ON, create a global flash sale
    if ($request->is_active) {
        FlashSale::create([
            'product_id' => null,      // Not specific to a product
            'category_id' => null,     // Not specific to a category
            'discount_percentage' => 10, // Default discount
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'is_active' => true,
        ]);
    }

    return redirect()->route('admin.flashsales.index')->with('success', 'Global flash sale status updated!');
}
}