<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('user.account', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'required|string',
        ]);

        $user = auth()->user();
        $user->update($request->only('name', 'email', 'phone'));

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}