<?php

namespace App\Http\Controllers;

use App\User;
use App\JobPost;
use Carbon\Carbon;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployerMatchmakingController extends Controller
{
    //This controller is dedicated to returning Job Seekers to the matchmaker based on filters/parameters

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

    //Get filtered user by STATE
    public function getUsersByStateFilter($state){
        $users = User::where('state', $state)->get();
        /* Populate an array of users*/
        $Users = array();
        foreach ($users as $user) {
            array_push($Users, $user);
        }
        return $Users;
    }

    //Get filtered user by CITY
    public function getUsersByCityFilter($city){
        $users = User::where('city', $city)->get();
        /* Populate an array of users*/
        $Users = array();
        foreach ($users as $user) {
            array_push($Users, $user);
        }
        return $Users;
    }

    //Get filtered user by STATE AND CITY
    public function getUsersByCityStateFilter($state, $city){
        $users = User::where('state', $state)->where('city', $city)->get();
        /* Populate an array of users*/
        $Users = array();
        foreach ($users as $user) {
            array_push($Users, $user);
        }
        return $Users;
    }

}
