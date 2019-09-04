<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployerLoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.employer-login');
    }

    public function login(){
        return true;
    }

}
