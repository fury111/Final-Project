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
        // Carousel Products - Get latest products for carousel
        $carouselProducts = Product::with('category')
            ->latest()
            ->limit(3)
            ->get();

        // Featured Products - Get latest products
        $featuredProducts = Product::with('category')
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
                    'sale' => false,
                    'old_price' => null
                ];
            })
            ->toArray();

        // Best Sellers - Random products
        $bestSellers = Product::with('category')
            ->orderByRaw('RAND()')
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
                    'sale' => false,
                    'old_price' => null
                ];
            })
            ->toArray();

        // On Sale Products - Random products (no flash sales)
        $onSale = Product::with('category')
            ->orderByRaw('RAND()')
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
                    'sale' => false,
                    'old_price' => null // No discounts
                ];
            })
            ->toArray();

        // Categories
        $categories = Category::all();

        // Promo Banners (optional)
        $banners = PromoBanner::where('is_active', true)->get();

        return view('user.home', compact(
            'carouselProducts',
            'featuredProducts',
            'bestSellers', 
            'onSale',
            'categories',
            'banners'
        ));
    }
}