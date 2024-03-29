<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employer;
use Illuminate\Support\Facades\Auth;
class EmployerProfileEditController extends Controller
{
    public function edit()
    {
        if (Auth::guard('employer')->check()) {
            $employer = Auth::guard('employer')->user();
            if ($employer) {
                return view('employer/editprofile/user.edit')->with('employer', $employer);
            }
            {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function update(Request $request) {
        $employer = Auth::guard('employer')->user();
        if ($employer) {
            $validate = null;
            if (Auth::guard('employer')->user()->email === $request['email']){
                $validate = $request->validate([
                    'company_name' => '|min:2',
                    'email' => '|email|min:2',
                    'contact_email' => '|email|min:2',
                    'contact_phone' => '|min:2'




                ]);
            } else {
                $validate = $request->validate([
                    'company_name' => '|min:2',
                    'email' => '|email|min:2',
                    'contact_email' => '|email|min:2',
                    'contact_phone' => '|min:2'


                ]);
            }
            if ($validate) {
                $employer->company_name = $request['company_name'];
                $employer->email = $request['email'];
                $employer->contact_email = $request['contact_email'];
                $employer->contact_phone = $request['contact_phone'];




                $employer->save();
                $request->session()->flash('success', 'Your details have been updated!');
                return redirect()->route('employer.dashboard');
            }
            else {
                return redirect()->back();
            }
            $employer->company_name = $request['company_name'];
            $employer->email = $request['email'];
            $employer->contact_email = $request['contact_email'];
            $employer->contact_phone = $request['contact_phone'];

            $employer->save();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
