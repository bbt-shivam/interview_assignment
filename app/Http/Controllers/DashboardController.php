<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $dashboard = Auth::user()->role === 'employee' ? 'pages.employee_dashboard' : 'pages.dealer_dashboard';
        return view($dashboard);
    }
}
