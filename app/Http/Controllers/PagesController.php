<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Homepage';
        return view('pages/index')->with('title', $title);
    }

    public function about(){
        $title = 'About';
        return view('pages/about')->with('title', $title);
    }
	
	public function login(){
        $title = 'Login';
        return view('pages/login')->with('title', $title);
    }

    public function services(){
        $data = array(
        'title' => 'Services',
        'services' => ['A', 'B', 'C']
        );

        return view('pages/services')->with($data);
    }
}
