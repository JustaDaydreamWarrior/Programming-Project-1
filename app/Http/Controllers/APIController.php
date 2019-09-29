<?php

namespace App\Http\Controllers;

use App\Employer;
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

    //Get filtered results (currently only filters by state)
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
