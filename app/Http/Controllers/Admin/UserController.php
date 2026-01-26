<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Admin; // Add this import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function users()
    {
        $users = User::whereNotNull('created_at')->get();
        $admins = Admin::whereNotNull('created_at')->get();
        
        return view('admin.users', compact('users', 'admins'));
    }

    public function create()
    {
        return view('admin.usercreate');
    }

    public function profile()
    {
        $totalOrders = Order::count();
        
        return view('admin.adminprofile', compact('totalOrders'));
    }

    public function updateProfile(Request $request)
    {
        $admin = auth()->guard('admin')->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|confirmed|min:8',
        ]);

        $data = $request->only(['name', 'email']);
        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
    }
}