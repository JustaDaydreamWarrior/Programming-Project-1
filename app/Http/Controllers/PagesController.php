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
        $data = array(
        'title' => 'Support',
        'services' => ['A', 'B', 'C']
        );

        return view('pages/support')->with($data);
    }

    public function login(){
        $title = 'Login';
        return view('pages/login')->with('title', $title);
    }

    public function register(){
        $title = 'Registration';
        return view('pages/register')->with('title', $title);
    }
}
