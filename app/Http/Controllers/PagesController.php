<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Homepage';
        return view('pages/homepage')->with('title', $title);
    }

    public function about(){
        $title = 'About';
        return view('pages/about')->with('title', $title);
    }

    public function support(){
        $title = 'Support';
        return view('pages/support')->with('title', $title);
    }

    public function login(){
        $title = 'Login';
        return view('pages/login')->with('title', $title);
    }

    public function register(){
        $title = 'Registration';
        return view('pages/register')->with('title', $title);
    }

    public function employer_login(){
        $title = 'Employer Login';
        return view('pages/Auth/employer-login')->with('title', $title);
    }
}
