<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'state' => 'required|string|in:NSW,ACT,VIC,QLD,SA,WA,NT,TAS',
            'city' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
            'experience' => 'required|integer|min:0|max:100',
            'education' => 'required|integer|min:0|max:10',
            'java' => 'required|boolean',
            'c' => 'required|boolean',
            'csharp' => 'required|boolean',
            'cplus' => 'required|boolean',
            'php' => 'required|boolean',
            'html' => 'required|boolean',
            'css' => 'required|boolean',
            'python' => 'required|boolean',
            'javascript' => 'required|boolean',
            'sql' => 'required|boolean',
            'windows10' => 'required|boolean',
            'windows7' => 'required|boolean',
            'windowsOld' => 'required|boolean',
            'windowsServer' => 'required|boolean',
            'macOS' => 'required|boolean',
            'linux' => 'required|boolean',
            'bash' => 'required|boolean',
            'ciscoSystems' => 'required|boolean',
            'microsoftOffice' => 'required|boolean',
            'ruby' => 'required|boolean',
            'powershell' => 'required|boolean',
            'rust' => 'required|boolean',
            'iOS' => 'required|boolean',
            'adobe' => 'required|boolean',
            'cloud' => 'required|boolean'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'state' => $data['state'],
            'city' => $data['city'],
            'experience' => $data['experience'],
            'education' => $data['education'],
            'java' => $data['java'],
            'c' => $data['c'],
            'csharp' => $data['csharp'],
            'cplus' => $data['cplus'],
            'php' => $data['php'],
            'html' => $data['html'],
            'css' => $data['css'],
            'python' => $data['python'],
            'javascript' => $data['javascript'],
            'sql' => $data['sql'],
            'unix' => $data['unix'],
            'windows10' => $data['windows10'],
            'windows7' => $data['windows7'],
            'windowsOld' => $data['windowsOld'],
            'windowsServer' => $data['windowsServer'],
            'macOS' => $data['macOS'],
            'linux' => $data['linux'],
            'bash' => $data['bash'],
            'ciscoSystems' => $data['ciscoSystems'],
            'microsoftOffice' => $data['microsoftOffice'],
            'ruby' => $data['ruby'],
            'powershell' => $data['powershell'],
            'rust' => $data['rust'],
            'iOS' => $data['iOS'],
            'adobe' => $data['adobe'],
            'cloud' => $data['cloud']
        ]);
    }
}
