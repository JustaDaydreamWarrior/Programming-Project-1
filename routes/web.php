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

Route::resource('jobPosts', 'JobPostsController');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Employer routes
Route::get('/employer/login', 'Auth\EmployerLoginController@showLoginForm')->name('employer.login');
Route::post('/employer/login', 'Auth\EmployerLoginController@login')->name('employer.login.submit');
Route::get('/employer/dashboard', 'EmployerController@dashboard')->name('employer.dashboard');
Route::get('/employer', 'EmployerController@index')->name('employer.home');
