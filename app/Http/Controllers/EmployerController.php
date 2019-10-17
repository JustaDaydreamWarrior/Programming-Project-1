<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employer;
use Auth;
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
    
        // $user_id = auth()->user()->id;
        $user_id = Auth::guard('employer')->user()->id;
        // dd($user_id);
        $user = Employer::find($user_id);
        // dd($user);
        
        return view('employer.employer_dashboard')->with('jobPosts', $user->jobPost);
    
        // return view('employer/employer_dashboard');
    }
}