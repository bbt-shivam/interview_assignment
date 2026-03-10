<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('pages.home');
})->name('home');

// auth routes

Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
    
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
});

// authenticated routes
// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/profile/update',[ProfileController::class,'updateProfile']);
    Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('delear/address',[RegisterController::class, 'delearAddress'])->name('dealer.address');
    Route::post('delear/registration',[RegisterController::class, 'updateDealerAddress'])->name('dealer.address.update');

    // dealers
    Route::get('/dealers', [DealerController::class, 'index'])->name('dealers.index');
    Route::get('/dealers/list', [DealerController::class, 'list'])->name('dealers.list');
    Route::put('/dealers/{dealer}/address', [DealerController::class, 'updateAddress']);
});