<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\User;
use App\Employer;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = Employer::find($user_id);
        // return view('pages/dashboard')->with('jobPosts', $user->jobPosts);

        return view('pages/dashboard');
    }
    

    public function mail()
    {
        $name = 'Anthony';
        Mail::to('group54capstone@outlook.com')->send(new SendMailable($name));

        return 'Email was sent';
    }

}

