<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;

class EmployerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employer', ['except' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('employer/employer_home');
    }

    public function dashboard()
    {
    
        $user_id = auth()->user()->id;
        $user = Employer::find($user_id);
        return view('employer.employer_dashboard')->with('jobPosts', $user->jobPosts);
    
        // return view('employer/employer_dashboard');
    }


}
