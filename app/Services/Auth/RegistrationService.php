<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationService
{
    public function register(array $validated): User
    {
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['register_as'],
            'password' => Hash::make($validated['password']),
        ]);

        // Auto login for web
        Auth::login($user);
        request()->session()->regenerate();
        return $user;
    }

    public function incompleteDealerRegistration(){
        $user = User::find(Auth::id());
        if($user->role === 'dealer'){
            if($user->state == null || $user->city == null || $user->zipcode == null){
                return true;
            }
        }
        return false;
    }

    public function updateDealerAddress(array $address){
        $user = Auth::user();
        $user->update([
            'state' => $address['state'],
            'city' => $address['city'],
            'zipcode' => $address['zipcode'],
        ], ['id' => Auth::id()]);

        return true;
    }
}