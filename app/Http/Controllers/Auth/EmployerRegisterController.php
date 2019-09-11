<?php
namespace App\Http\Controllers;
use App\Employer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class EmployerRegisterController extends Controller
    /*
    |--------------------------------------------------------------------------
    | Employer Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new employers as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
{
    use RegistersUsers;
    public function __construct()
    {
        $this->middleware('guest:employer');
    }
    protected function showRegisterForm(){
        return view('auth.employer-register');
    }
    protected function create(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $employer = Employer::create([
            'company_name' => $request['company_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'contact_email' => $request['contact_email']
        ]);
        return redirect()->intended(route('employer.login'));
    }
}
