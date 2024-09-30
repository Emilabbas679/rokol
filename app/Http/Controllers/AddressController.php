<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\CreateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::query()
            ->where('user_id', fUserId())
            ->get();
        return view('address', compact('addresses'));
    }

    public function show(int $id)
    {
        $address = Address::query()
            ->where('user_id', fUserId())
            ->findOrFail($id);
        return response()->json($address->toArray());
    }

    public function store(AddressRequest $request)
    {
        $validated = collect($request->validated());
        $validated->put('user_id', fUserId());
        $address = Address::query()->create(
            $validated->toArray()
        );

        if ($request->wantsJson()){
            return response()->json($address->toArray());
        }
        session()->flash('status', 'Address successfully created!');
        return response()->json(['status' => 'success']);
    }

    public function update(AddressRequest $request, int $id)
    {
        $validated = $request->validated();
        $address = Address::query()
            ->where('user_id', fUserId())
            ->findOrFail($id);
        $address->update(
            $validated
        );

        session()->flash('status', 'Address successfully updated!');
        return response()->json(['status' => 'success']);
    }

    public function destroy(int $id)
    {
        Address::query()
            ->where('user_id', fUserId())
            ->findOrFail($id)
            ->delete();
        return redirect()->route('addresses')->with('status', 'Address successfully deleted!');
    }
}
