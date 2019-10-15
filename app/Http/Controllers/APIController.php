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

    /* Create a new controller instance. */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Get currently authenticated user. */
    public function getUser()
    {
        $user = Auth::user();
        return $user;
    }

    /* Return a single job by ID. */
    public function getJobPost($id)
    {
        $jobpost = JobPost::where('id', $id)->get();

        return $jobpost;
    }

    /* Get all Job Postings by STATE. */
    public function getJobPostsByState($state)
    {
        $jobPosts = JobPost::where('state', $state)->get();

        /* Populate an array of jobPosts*/
        $JobPosts = array();
        foreach ($jobPosts as $job) {
            array_push($JobPosts, $job);
        }

        return $JobPosts;
    }


    /* Get all Job Postings . */
    public function getAllJobPosts()
    {
        $jobPosts = JobPost::all();
        /* Populate an array of jobPosts*/
        $JobPosts = array();
        foreach ($jobPosts as $job) {
            array_push($JobPosts, $job);
        }
        return $JobPosts;
    }
}
