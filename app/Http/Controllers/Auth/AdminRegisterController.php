<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
    /*
    |--------------------------------------------------------------------------
    | Employer Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new employers as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    protected function showRegisterForm()
    {
        return view('auth.admin-register');
    }

    protected function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6'
        ]);
        $employer = Admin::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect()->intended(route('admin.login'));
    }
}
