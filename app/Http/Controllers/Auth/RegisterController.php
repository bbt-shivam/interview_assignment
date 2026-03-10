<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\DealerAddressRequest;
use App\Services\Auth\RegistrationService;

class RegisterController extends Controller
{
    public function index(){
        return view('pages.register');
    }

    public function store(RegisterRequest $request, RegistrationService $service){
        $user = $service->register($request->validated());

        $redirect = $user->role === 'dealer'
        ? route('dealer.address')
        : route('dashboard');
        
        if ($request->ajax()) {

            return $this->success(
                null,
                'Register successful',
                200,
               $redirect
            );
        }

        return redirect()->to($redirect);
    }

    public function delearAddress(){
        return view('pages.dealer_address');
    }

    public function updateDealerAddress(DealerAddressRequest $request, RegistrationService $service){
        $service->updateDealerAddress($request->validated());
        return $this->success( 
                null,
                'Address Updated',
                200,
               route('dashboard'));
    }
}
