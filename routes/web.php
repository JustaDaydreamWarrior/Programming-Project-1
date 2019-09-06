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
use Illuminate\Support\Facades\Input;
// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/welcome', 'PagesController@welcome');

use App\Http\Controllers\Auth\EmployerLoginController;

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/support', 'PagesController@support');

Route::get('/login', 'PagesController@login');

Route::get('/register', 'PagesController@register');

Route::get('/sendemail', 'SendEmailController@index');

Route::post('/sendemail/send', 'SendEmailController@send');

Route::resource('jobPosts', 'JobPostsController');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Employer routes
Route::get('/employer/login', 'Auth\EmployerLoginController@showLoginForm')->name('employer.login');
Route::get('/employer/register', 'EmployerRegisterController@showRegisterForm')->name('employer.register');

Route::post('/employer/login', 'Auth\EmployerLoginController@login')->name('employer.login.submit');
Route::post('/employer/register', 'EmployerRegisterController@create')->name('employer.register.submit');

Route::get('/employer/dashboard', 'EmployerController@dashboard')->name('employer.dashboard');

Route::get('/employer', 'EmployerController@index')->name('employer.home');
Route::get('/profile/{name}', 'ProfileController@show')->name('profile.show');

Route::post('/search', function(){
    $q = Input::get('q');
    if($q != ' '){
        $user = User::where('name', 'LIKE', '%' . $q . '%')
                        ->orWhere('email', 'LIKE', '%' . $q . '%')
                        ->get();
        if(count($user) > 0)
            return view('welcome')->withDetails($user)->withQuery($q);
    }
    return view('welcome')->withMessage("No users were found in the database. Try again!");
});


