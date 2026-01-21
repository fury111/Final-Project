<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\PromoBanner;
use App\Models\FlashSale;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Featured Products
        $featuredProducts = Product::with('category', 'flashSale')
            ->limit(4)
            ->get()
            ->map(function($product) {
                return [
                    'name' => $product->name,
                    'price' => $product->price,
                    'category' => $product->category->name ?? 'Uncategorized',
                    'image' => $product->image_path,
                    'slug' => $product->slug,
                    'stock' => $product->stock_quantity,
                    'sale' => $product->flashSale ? true : false,
                    'old_price' => $product->flashSale ? $product->price * 1.2 : null
                ];
            })
            ->toArray();

        // Best Sellers - Updated to use a different sorting method
        $bestSellers = Product::with('category', 'flashSale')
            ->orderByRaw('RAND()') // Use random ordering instead of sales_count
            ->limit(4)
            ->get()
            ->map(function($product) {
                return [
                    'name' => $product->name,
                    'price' => $product->price,
                    'category' => $product->category->name ?? 'Uncategorized',
                    'image' => $product->image_path,
                    'slug' => $product->slug,
                    'stock' => $product->stock_quantity,
                    'sale' => $product->flashSale ? true : false,
                    'old_price' => $product->flashSale ? $product->price * 1.2 : null
                ];
            })
            ->toArray();

        // On Sale Products
        $onSale = Product::whereHas('flashSale')
            ->with(['category', 'flashSale'])
            ->limit(4)
            ->get()
            ->map(function($product) {
                return [
                    'name' => $product->name,
                    'price' => $product->price,
                    'category' => $product->category->name ?? 'Uncategorized',
                    'image' => $product->image_path,
                    'slug' => $product->slug,
                    'stock' => $product->stock_quantity,
                    'sale' => true,
                    'old_price' => $product->price * 1.2
                ];
            })
            ->toArray();

        // Categories
        $categories = Category::all();

        // Promo Banners (optional)
        $banners = PromoBanner::where('is_active', true)->get();

        return view('user.home', compact(
            'featuredProducts',
            'bestSellers', 
            'onSale',
            'categories',
            'banners'
        ));
    }
}