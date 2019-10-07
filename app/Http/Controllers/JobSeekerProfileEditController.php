<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class JobSeekerProfileEditController extends Controller
{
    public function edit(){
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user) {
                return view('jobseeker/editprofile/user.edit')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else{
            return redirect()->back();
        }

    }

    public function update(Request $request) {
        $user = User::find(Auth::user()->id);

        if ($user) {
            $validate = null;
            if (Auth::user()->email === $request['email']){

                $validate = $request->validate([

                    'name' => 'required|min:2',
                    'email' => '|email|min:2',
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
                    'android' => 'required|boolean',
                    'unix' => 'required|boolean',
                    'ciscoSystems' => 'required|boolean',
                    'microsoftOffice' => 'required|boolean',
                    'ruby' => 'required|boolean',
                    'powershell' => 'required|boolean',
                    'rust' => 'required|boolean',
                    'iOS' => 'required|boolean',
                    'adobe' => 'required|boolean',
                    'cloud' => 'required|boolean'


                ]);
            } else {

                $validate = $request->validate([

                    'name' => 'required|min:2',
                    'email' => '|email|min:2',
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
                    'android' => 'required|boolean',
                    'macOS' => 'required|boolean',
                    'linux' => 'required|boolean',
                    'bash' => 'required|boolean',
                    'unix' => 'required|boolean',
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

            if ($validate) {
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->state = $request['state'];
                $user->city = $request['city'];
                $user->experience = $request['experience'];
                $user->education = $request['education'];
                $user->java = $request['java'];
                $user->c = $request['c'];
                $user->cplus = $request['cplus'];
                $user->csharp = $request['csharp'];
                $user->php = $request['php'];
                $user->html = $request['html'];
                $user->css = $request['css'];
                $user->python = $request['python'];
                $user->javascript = $request['javascript'];
                $user->sql = $request['sql'];
                $user->windows10 = $request['windows10'];
                $user->windows7 = $request['windows7'];
                $user->windowsOld = $request['windowsOld'];
                $user->windowsServer = $request['windowsServer'];
                $user->macOS = $request['macOS'];
                $user->linux = $request['linux'];
                $user->bash = $request['bash'];
                $user->unix = $request['unix'];
                $user->android = $request['android'];
                $user->ciscoSystems = $request['ciscoSystems'];
                $user->microsoftOffice = $request['microsoftOffice'];
                $user->ruby = $request['ruby'];
                $user->powershell = $request['powershell'];
                $user->rust = $request['rust'];
                $user->iOS = $request['iOS'];
                $user->adobe = $request['adobe'];
                $user->cloud = $request['cloud'];




                $user->save();

                $request->session()->flash('success', 'Your details have been updated!');
                return redirect()->route('home');



            }
            else {
                return redirect()->back();
            }
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->state = $request['state'];
            $user->city = $request['city'];
            $user->experience = $request['experience'];
            $user->education = $request['education'];
            $user->java = $request['java'];
            $user->c = $request['c'];
            $user->cplus = $request['cplus'];
            $user->csharp = $request['csharp'];
            $user->php = $request['php'];
            $user->html = $request['html'];
            $user->css = $request['css'];
            $user->python = $request['python'];
            $user->javascript = $request['javascript'];
            $user->sql = $request['sql'];
            $user->android = $request['android'];
            $user->windows10 = $request['windows10'];
            $user->windows7 = $request['windows7'];
            $user->windowsOld = $request['windowsOld'];
            $user->windowsServer = $request['windowsServer'];
            $user->macOS = $request['macOS'];
            $user->linux = $request['linux'];
            $user->bash = $request['bash'];
            $user->unix = $request['unix'];
            $user->ciscoSystems = $request['ciscoSystems'];
            $user->microsoftOffice = $request['microsoftOffice'];
            $user->ruby = $request['ruby'];
            $user->powershell = $request['powershell'];
            $user->rust = $request['rust'];
            $user->iOS = $request['iOS'];
            $user->adobe = $request['adobe'];
            $user->cloud = $request['cloud'];



            $user->save();

            return redirect()->back();

        } else {
            return redirect()->back();
        }





    }
}
