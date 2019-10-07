<?php

namespace App\Http\Controllers;

use App\User;
use App\JobPost;
use Carbon\Carbon;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployerAPIController extends Controller
{
    //This controller is dedicated to returning job postings to the matchmaker

    // Create a new controller instance.
    public function __construct()
    {
        $this->middleware('auth:employer');
    }

    //Get all Job Seekers
    public function getAllUsers()
    {
            $users = User::all();
            /* Populate an array of users*/
            $Users = array();
            foreach ($users as $user) {
                array_push($Users, $user);
            }
            return $Users;
        }

    //Get filtered user results (currently only filters by state)
    public function getUsersByFilter($state){
        $users = User::where('state', $state)->get();
        /* Populate an array of jobPosts*/
        $Users = array();
        foreach ($users as $user) {
            array_push($JobPosts, $user);
        }
        return $Users;
    }

}