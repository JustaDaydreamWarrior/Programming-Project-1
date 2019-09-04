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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{name}', 'ProfileController@show')->name('profile.show');

Route::post('/search', function(){
    $match = Input::get('match');
    if($match != ' '){
        $user = User::where('name', 'LIKE', '%' . $match . '%')
                        ->orWhere('email', 'LIKE', '%' . $match . '%')
                        ->get();
        if(count($user) > 0)
            return view('welcome')->withDetails($user)->withQuery($match);
    }
    return view('welcome')->withMessage("Could not find any users on the database. Try again!");
});
