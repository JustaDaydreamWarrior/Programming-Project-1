<?php
namespace App\Http\Controllers;
use App\Employer;
use Illuminate\Http\Request;
class EmployerProfileHomeController extends Controller
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
        return view('/employer/profiles/employerprofilehomepage', compact('employers'));
    }
}
