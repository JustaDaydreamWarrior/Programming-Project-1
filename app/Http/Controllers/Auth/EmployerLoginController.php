<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employer', ['except' => ['logout']]);
    }

    public function showLoginForm(){
        return view('auth.employer-login');
    }

    public function login(Request $request){
        //validate form data
        $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required|min:6'
        ]);

        // Attempt to log user in
        if (Auth::guard('employer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //if successful, the redirect to intended page
            return redirect()->intended(route('employer.dashboard'));
        };
        //if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout()
    {
        Auth::guard('employer')->logout();

        return redirect()->route('employer.home');
    }

}
