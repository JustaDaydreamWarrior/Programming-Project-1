<?php
namespace App\Http\Controllers;
use App\Employer;
use Illuminate\Http\Request;
class EmployerProfileTemplateController extends Controller
{
    public function employershow($company_name){
        $user = Employer::where('company_name', $company_name)->first();
        if($user) {
            //User exists
            return view('/employer/profiles/employer_profile_template')->with('user', $user);
        } else {
            //Returns false, user doesn't exist
            dd($user);
        }
    }
}
