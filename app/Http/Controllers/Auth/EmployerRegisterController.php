<?php

namespace App\Http\Controllers;

use App\Employer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {

        $this->middleware('guest:employer');
    }

    protected function showRegisterForm(){
        return view('auth.employer_register');
    }

    protected function create(Request $request){
        $this->validator($request->all())->validate();
        $employer = Employer::create([
            'company_name' => $request['company_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect()->intended('employer.login');
    }
}
