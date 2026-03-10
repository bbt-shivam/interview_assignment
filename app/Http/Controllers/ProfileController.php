<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{   

    public function dealerDashboard()
    {
        return view('dealer.dashboard');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'zipcode' => 'required|min:5|max:10'
        ]);

        $user = Auth::user();

        $user->update([
            'state' => $request->state,
            'city' => $request->city,
            'zipcode' => $request->zipcode
        ]);

        return $this->success(
            message: 'Profile updated successfully'
        );
    }
}
