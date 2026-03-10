<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginService
{
    public function __construct()
    {}

    public function login(array $credentials): User
    {
        $user = User::where('email', $credentials['email'])->first();

        if (! Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        request()->session()->regenerate();
        $user = Auth::user();

        return $user;
    }
}