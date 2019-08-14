<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function welcome(){
        return view('pages/welcome');
    }

    public function index(){
        $title = 'Home';
        return view('pages/index')->with('title', $title);
    }

    public function about(){
        $title = 'About';
        return view('pages/about')->with('title', $title);
    }

    public function services(){
        $data = array(
        'title' => 'Services',
        'services' => ['A', 'B', 'C']
        );

        return view('pages/services')->with($data);
    }
}
