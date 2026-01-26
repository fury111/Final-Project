<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->orderBy('is_default', 'desc')->get();
        return view('user.addresses', compact('addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:50',
            'full_name' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
        ]);

        // If setting as default, unset others
        if ($request->is_default) {
            Address::where('user_id', Auth::id())->update(['is_default' => false]);
        }

        Address::create([
            'user_id' => Auth::id(),
            'label' => $request->label,
            'full_name' => $request->full_name,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country ?? 'United States',
            'phone' => $request->phone,
            'is_default' => $request->is_default ?? false,
        ]);

        return redirect()->route('addresses')->with('success', 'Address added successfully!');
    }

    public function update(Request $request, $id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'label' => 'required|string|max:50',
            'full_name' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
        ]);

        // If setting as default, unset others
        if ($request->is_default) {
            Address::where('user_id', Auth::id())->update(['is_default' => false]);
        }

        $address->update([
            'label' => $request->label,
            'full_name' => $request->full_name,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'phone' => $request->phone,
            'is_default' => $request->is_default ?? false,
        ]);

        return redirect()->route('addresses')->with('success', 'Address updated successfully!');
    }

    public function destroy($id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);
        $address->delete();

        return redirect()->route('addresses')->with('success', 'Address deleted successfully!');
    }

    public function setDefault($id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);
        
        // Unset all defaults
        Address::where('user_id', Auth::id())->update(['is_default' => false]);
        
        // Set this one as default
        $address->update(['is_default' => true]);

        return redirect()->route('addresses')->with('success', 'Default address updated!');
    }
}