<?php

namespace App\Http\Controllers;

use App\User;
use App\Employer;
use Illuminate\Support\Facades\Input;

class SearchFunctionalityController extends Controller
{
    public function index()
    {
        $q = Input::get('q');
        if ($q != "") {
            $employer = Employer::where('company_name', 'LIKE', '%' . $q . '%')
                ->orWhere('contact_email', 'LIKE', '%' . $q . '%')->get();
            if (count($employer) > 0)
                return view('search-functionality-in-laravel/welcome')->withDetails($employer)->withQuery($q);
        }
        return view('search-functionality-in-laravel/welcome')->withMessage('No details found. Try to search again !');
    }
}
