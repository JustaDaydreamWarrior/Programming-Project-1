<?php

namespace App\Http\Controllers;

use App\User;
use App\Employer;
use App\JobPost;
use Illuminate\Support\Facades\Input;

class SearchJobFunctionalityController extends Controller
{
    public function index()
    {
        $q = Input::get('q');
        if ($q != "") {
            $jobpost = JobPost::where('title', 'LIKE', '%' . $q . '%')
                ->orWhere('organisation', 'LIKE', '%' . $q . '%')->get();
            if (count($jobpost) > 0)
                return view('search-functionality-in-laravel/welcome')->withDetails($jobpost)->withQuery($q);
        }
        return view('search-functionality-in-laravel/welcome')->withMessage('No details found. Try to search again !');
    }
}
