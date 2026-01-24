<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['product', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.reviews', compact('reviews'));
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['is_approved' => 1]);

        return redirect()->back()->with('success', 'Review approved successfully!');
    }

    public function hide($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['is_approved' => -1]);

        return redirect()->back()->with('success', 'Review hidden successfully!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }
}