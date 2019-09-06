<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;

class SearchFunctionalityController extends Controller
{
    public function index(){
    $q = Input::get ( 'q');
    if($q != ""){
        $user = User::where('name', 'LIKE', '%' . $q . '%')
        ->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        if(count($user) > 0)
           return view ( 'search-functionality-in-laravel/welcome' )->withDetails ( $user)->withQuery ( $q );
    }
    return view ( 'search-functionality-in-laravel/welcome' )->withMessage ( 'No details found. Try to search again !');
    }
}
