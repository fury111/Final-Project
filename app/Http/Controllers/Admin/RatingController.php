<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['product', 'user'])
            ->whereNotNull('rating')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.ratings', compact('reviews'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.ratings.index')->with('success', 'Rating deleted successfully!');
    }
}