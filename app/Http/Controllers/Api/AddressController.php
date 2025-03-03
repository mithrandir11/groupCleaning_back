<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressController extends Controller
{
    public function getUserAddresses(Request $request){
        $addresses = Address::where('user_id', $request->user()->id)
        ->select('id', 'full_address', 'state', 'city')
        ->latest()
        ->get()
        ->unique('full_address');
        return Response::success(null, $addresses);
    }

    public function createAddress(Request $request){
        $validated = $request->validate([
            'full_address' => ['required','string'],
            'city' => ['required','string'],
            'state' => ['required','string'],
        ]);
        $validated['user_id'] = $request->user()->id;
        $address = Address::create($validated);
        return Response::success(null, $address);
    }


    public function editAddress(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:addresses,id',
            'full_address' => ['required','string'],
            'city' => ['required','string'],
            'state' => ['required','string'],
        ]);

        $address = Address::find($request->id);

        $address->update([
            'state' => $request->state,
            'city' => $request->city,
            'full_address' => $request->full_address,
        ]);

        return Response::success(null, $address);
    }


}
