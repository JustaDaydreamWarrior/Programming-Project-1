<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
class JobSeekerProfileTemplateController extends Controller
{
    public function show($name){
        $user = User::whereName($name)->first();
        if($user) {
            //User exists
            return view('/jobseeker/profiles/jobseeker_profile_template')->withUser($user);
        } else {
            //Returns false, user doesn't exist
            dd($user);
        }
    }
}
