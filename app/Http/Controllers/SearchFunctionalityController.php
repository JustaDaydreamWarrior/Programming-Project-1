<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\User;


class SearchFunctionalityController extends Controller
{
    public function index(){
    $match = Input::get ( 'match');
    if($match != ""){
        $user = User::where('name', 'LIKE', '%' . $match . '%')
        ->orWhere('email', 'LIKE', '%' . $match . '%')->get();
        if(count($user) > 0)
           return view ( 'search-functionality-in-laravel/welcome' )->withDetails ( $user)->withQuery ( $match );
    }
    return view ( 'search-functionality-in-laravel/welcome' )->withMessage ( 'No details found. Try to search again !');
    }
}
