<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use App\Services\Auth\RegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('pages.login');
    }

    public function store(LoginRequest $request, LoginService $service, RegistrationService $registerService){
        $user = $service->login($request->validated());

        $incompleteDealerRegistration = $registerService->incompleteDealerRegistration();

        $redirect = route('dashboard');
        if($incompleteDealerRegistration) $redirect = route('dealer.address');
        
        if ($request->ajax()) {
            return $this->success(
                null,
                'Login successful',
                200,
                $redirect
            );
        }

        return redirect()->to($redirect);
    }

    public function destroy(){
        Auth::logout();
        return redirect()->route('login');
    }
}
