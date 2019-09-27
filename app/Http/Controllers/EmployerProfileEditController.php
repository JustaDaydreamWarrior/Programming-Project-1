<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use Illuminate\Support\Facades\Auth;

class EmployerProfileEditController extends Controller
{
    public function edit(){
        if (Auth::user()) {
            $employer = Employer::find(Auth::user()->id);

            if ($employer) {
                return view('employeredit/user.edit')->withEmployer($employer);
            } else {
                return redirect()->back();
            }
        } //else{
            //return redirect()->back();
        //}

    }

    public function update(Request $request) {
        $employer = Employer::find(Auth::user()->id);

        if ($employer) {
            $validate = null;
            if (Auth::user()->email === $request['email']){

                $validate = $request->validate([

                    'company_name' => 'required|min:2',
                    'email' => 'required|email|unique:users'
                ]);
            } else {

                $validate = $request->validate([

                    'name' => 'required|min:2',
                    'email' => 'required|email|unique:users'
                ]);

            }

            if ($validate) {
                $employer->company_name = $request['name'];
                $employer->email = $request['email'];

                $employer->save();

                $request->session()->flash('success', 'Your details have been updated!');
                return redirect()->back();



            }
            else {
                return redirect()->back();
            }
            $employer->company_name = $request['name'];
            $employer->email = $request['email'];

            $employer->save();

            return redirect()->back();

        } else {
            return redirect()->back();
        }





    }
}
