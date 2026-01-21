<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        
        $approvedReviews = Review::where('product_id', $product->id)
                                ->where('is_approved', true)
                                ->with('user')
                                ->get();

        return view('user.product', compact('product', 'approvedReviews'));
    }
}