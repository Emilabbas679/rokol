<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function edit()
    {
        $user = fUser();
        return view('settings', compact('user'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'min:3', 'max:30'],
            'current_password' => ['required', 'string', 'min:8', 'max:20', 'current_password:web'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
        ])->validated();
        User::query()->where('id', fUserId())
            ->update([
                'full_name' => $validated['full_name'],
                'password' => Hash::make($validated['password'])
            ]);
        return redirect()->route('home');
    }

}
