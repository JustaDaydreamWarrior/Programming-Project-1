<?php

namespace App\Http\Controllers;

use App\Employer;
use Illuminate\Http\Request;

class EmployerProfileController extends Controller
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


    public function employerindex()
    {
        $employers = Employer::paginate(2);

        return view('/employerprofile/employerprofilehomepage', compact('employers'));

    }
}
