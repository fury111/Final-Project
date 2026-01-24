<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->get();
        return view('user.addresses', compact('addresses'));
    }

    public function create()
    {
        return view('user.addresses.create');
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
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'label' => $request->label,
            'full_name' => $request->full_name,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'is_default' => $request->has('is_default'),
        ]);

        return redirect()->route('addresses')->with('success', 'Address saved successfully!');
    }

    public function edit($id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);
        return view('user.addresses.edit', compact('address'));
    }

    public function update(Request $request, $id)
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
        ]);

        $address = Address::where('user_id', Auth::id())->findOrFail($id);
        $address->update($request->only([
            'label', 'full_name', 'address_line1', 'address_line2',
            'city', 'state', 'postal_code', 'country'
        ]));

        return redirect()->route('addresses')->with('success', 'Address updated successfully!');
    }

    public function destroy($id)
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($id);
        $address->delete();

        return redirect()->route('addresses')->with('success', 'Address deleted successfully!');
    }
}