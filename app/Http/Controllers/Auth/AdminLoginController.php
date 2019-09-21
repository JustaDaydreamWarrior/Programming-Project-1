<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employer', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    //ToDo update for admin auth
    public function login(Request $request)
    {
        //validate form data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        // Attempt to log user in
        if (Auth::guard('employer')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            //if successful, the redirect to intended page
            return redirect()->intended(route('employer.dashboard'));
        };
        //if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('username', 'remember'));

    }

    //ToDo update for admin auth
    public function logout()
    {
        Auth::guard('employer')->logout();

        return redirect()->route('employer.home');
    }

}
