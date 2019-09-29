<?php

namespace App\Http\Controllers;

use App\User;
use App\JobPost;


use Auth;
use Carbon\Carbon;
use Session;

use App\Http\Controllers\Controller;

class APIController extends Controller
{
    //This controller is dedicated to returning job postings to the matchmaker

    // Create a new controller instance.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Get current logged in user.
    public function getUser()
    {
        $user = Auth::user();
        return $user;
    }

    //Get all Job Seekers
    public function getAllUsers(){

        Auth::user();
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


    //Return a single job by ID. Currently unused
    public function getJobPost($id)
    {
        $jobPost = JobPost::where('id', $id)->get();

        return $jobPost;
    }

    //Get all Job Postings
    public function getAllJobPosts(){
        $jobPosts = JobPost::all();
        /* Populate an array of jobPosts*/
        $JobPosts = array();
        foreach ($jobPosts as $job) {
            array_push($JobPosts, $job);
        }
        return $JobPosts;
    }

    //Get filtered job posting results (currently only filters by state)
    public function getJobPostsByFilter($state){
        $jobPosts = JobPost::where('state', $state)->get();
        /* Populate an array of jobPosts*/
        $JobPosts = array();
        foreach ($jobPosts as $job) {
            array_push($JobPosts, $job);
        }
        return $JobPosts;
    }



}
