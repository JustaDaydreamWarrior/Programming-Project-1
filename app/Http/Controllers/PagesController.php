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
        return view('/email')->with('title', $title);
    }

    public function login(){
        $title = 'Login';
        return view('pages/login')->with('title', $title);
    }

    public function register(){
        $title = 'Registration';
        return view('pages/register')->with('title', $title);
    }

    public function employers(){
        $title = 'Employers Homepage';
        return view('employer/employer_home')->with('title', $title);
    }
}
