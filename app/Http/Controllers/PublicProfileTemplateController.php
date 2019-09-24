<?php

namespace App\Http\Controllers;

use App\User;
use App\Employer;
use Illuminate\Http\Request;

class PublicProfileTemplateController extends Controller
{
    public function show($name){
        $user = User::whereName($name)->first();

        if($user) {
            //User exists

            return view('/publicprofile/public_profile_template')->withUser($user);
        } else {
            //Returns false, user doesn't exist

            dd($user);
        }
    }
}