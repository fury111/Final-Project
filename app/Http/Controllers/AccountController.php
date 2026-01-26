<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        // Get user stats
        $totalOrders = $user->orders()->count();
        $wishlistCount = 0; // You can implement wishlist functionality later


        return view('user.account', compact('user', 'totalOrders', 'wishlistCount'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'receive_newsletter' => 'boolean',
            'receive_sms' => 'boolean',
            'receive_deals' => 'boolean',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);


        return redirect()->route('account')->with('success', 'Profile updated successfully!');
    }
}