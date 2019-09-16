<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Employer;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Auth\EmployerLoginController;


// Controller Routes
Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/support', 'PagesController@support');

Route::get('/login', 'PagesController@login');

Route::get('/register', 'PagesController@register');

Route::get('/email', 'EmailController@index');

Route::post('/email/send', 'EmailController@send');

Route::resource('jobPosts', 'JobPostsController');

Route::resource('posts', 'PostsController');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/logout', 'Auth\LoginController@userLogout')->name('userLogout');

// Employer routes
Route::get('/employer/login', 'Auth\EmployerLoginController@showLoginForm')->name('employer.login');
Route::get('/employer/register', 'EmployerRegisterController@showRegisterForm')->name('employer.register');

Route::post('/employer/login', 'Auth\EmployerLoginController@login')->name('employer.login.submit');
Route::post('/employer/register', 'EmployerRegisterController@create')->name('employer.register.submit');
Route::post('/employer/logout', 'Auth\EmployerLoginController@logout')->name('employer.logout');

Route::get('/employer/dashboard', 'EmployerController@dashboard')->name('employer.dashboard');
Route::get('/employer', 'EmployerController@index')->name('employer.home');


//Route::get('/profile/{name}', 'ProfileController@show')->name('profile.show');

// Authentication Routes
Auth::routes();


//Search Bar in job listings

Route::post('/search', function(){
    $q = Input::get('q');
    if($q != ' '){
        $employer = Employer::where('company_name', 'LIKE', '%' . $q . '%')
                        ->orWhere('contact_email', 'LIKE', '%' . $q . '%')
                        ->get();
        if(count($employer) > 0)
            return view('pages/searchresult')->withDetails($employer)->withQuery($q);
    }

    return view('pages/searchresult')->withMessage("No users were found in the database. Try again!");
});


