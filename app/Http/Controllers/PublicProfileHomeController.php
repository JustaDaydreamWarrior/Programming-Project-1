<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PublicProfileHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::paginate(2);

        return view('/publicprofile/publicprofilehomepage', compact('users'));

    }
}
