<?php
namespace App\Http\Controllers;
use App\User;
use App\Employer;
use Illuminate\Http\Request;
class PublicAndEmployerProfileTemplateController extends Controller
{
    public function show($name){
        $user = User::whereName($name)->first();
        if($user) {
            //User exists
            return view('/profiles/publicandemployer_profile_template')->withUser($user);
        } else {
            //Returns false, user doesn't exist
            dd($user);
        }
    }
    public function employershow($company_name){
        $user = Employer::where('company_name', $company_name)->first();
        if($user) {
            //User exists
            return view('/profiles/publicandemployer_profile_template')->with('user', $user);
        } else {
            //Returns false, user doesn't exist
            dd($user);
        }
    }
}
