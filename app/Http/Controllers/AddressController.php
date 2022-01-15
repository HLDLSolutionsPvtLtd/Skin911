<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AddressController extends Controller
{
    //
    public function all(Request $request)
    {
        return $request->user()->addresses;
    }
    public function store(Request $request)
    {
        $user = $request->user();
        $validated = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'state' => 'required',
            'city' => 'required',
            'district' => 'required',
            'street' => 'required',
            'landmark' => 'required',
            'house_no' => 'required',
            'pincode' => 'required'
        ]);
        Address::create(array_merge($validated, ['user_id' => $user->id]));
        return redirect()->back();
    }
    public function edit(Address $address, Request $request)
    {
        if($address->user_id == $request->user()->id)
        {
            return Inertia::render('EditAddress', ['address' => $address]);
        }
        else
        {
            return response('permission denied!!', 403);
        }
    }
    public function update(Address $address, Request $request)
    {
        $user = $request->user();
        $validated = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'state' => 'required',
            'city' => 'required',
            'district' => 'required',
            'street' => 'required',
            'landmark' => 'required',
            'house_no' => 'required',
            'pincode' => 'required'
        ]);
        $address->update($validated);
        return redirect()->back();
    }

    public function remove(Address $address)
    {
        $address->delete();
        return redirect()->back();
    }
}
