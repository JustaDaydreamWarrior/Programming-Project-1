<?php

namespace App\Http\Controllers\Auth;

use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
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
        $this->middleware('guest:employer');
    }

    protected function showRegisterForm()
    {
        return view('auth.employer-register');
    }

    protected function create(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email', 'unique:employers'],
            'password' => 'required|min:6'
        ]);
        $employer = Employer::create([
            'company_name' => $request['company_name'],
            'email' => $request['email'],
            'state' => $request['state'],
            'city' => $request['city'],
            'password' => Hash::make($request['password']),
            'contact_email' => $request['contact_email'],
            'contact_phone' => $request['contact_phone']

        ]);
        return redirect()->route('employer.login')->with('status','Registration successful');
    }
}
