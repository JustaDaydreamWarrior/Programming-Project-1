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

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/support', 'PagesController@support');

Route::get('/login', 'PagesController@login');

Route::get('/register', 'PagesController@register');

Route::get('/email', 'EmailController@index')->name('support');

Route::get('/matches', 'JobPostsController@matchingJobs')->name('matches');


Route::resource('jobPosts', 'JobPostsController');

Route::resource('posts', 'PostsController');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


//POST routes
Route::post('/email/send', 'EmailController@send');

Route::post('/jobPosts', 'JobPostsController@store')->name('jobPosts-create');

Route::post('/jobPosts/update', 'JobPostsController@updateJob')->name('updateJob');

// Employer Specific Routes
Route::get('/employer/login', 'Auth\EmployerLoginController@showLoginForm')->name('employer.login');
Route::post('/employer/login', 'Auth\EmployerLoginController@login')->name('employer.login.submit');

Route::get('/employer/register', 'Auth\EmployerRegisterController@showRegisterForm')->name('employer.register');
Route::post('/employer/register', 'Auth\EmployerRegisterController@create')->name('employer.register.submit');

Route::post('/employer/logout', 'Auth\EmployerLoginController@logout')->name('employer.logout');

Route::get('/employer/dashboard', 'EmployerController@dashboard')->name('employer.dashboard');
Route::get('/employer', 'EmployerController@index')->name('employer.home');

//Edit Public Profile Routes
Route::get('/publicprofile', 'PublicProfileHomeController@index')->name('publicprofile');

Route::get('/profile/{name}', 'PublicProfileTemplateController@show')->name('public_profile.show');

Route::get('/publicprofile{id}', 'PublicProfileEditController@profile')->name('user.profile');

Route::get('edit/publicprofile/', 'PublicProfileEditController@edit')->name('user.edit');

Route::post('edit/publicprofile/', 'PublicProfileEditController@update')->name('user.update');

//Edit Public Profile Routes
Route::get('/employerprofile', 'PublicProfileHomeController@employerindex')->name('publicprofile');

Route::get('/employer/{company_name}', 'PublicProfileTemplateController@employershow')->name('employer_profile.show');

//Route::get('/employerprofile{id}', 'PublicProfileEditController@profile')->name('user.profile');

//Route::get('edit/publicprofile/', 'PublicProfileEditController@edit')->name('user.edit');
//
//Route::post('edit/publicprofile/', 'PublicProfileEditController@update')->name('user.update');



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

// API Routes

// Return currently authenticated user.
Route::get('/api/user', 'APIController@getUser')->name('getUser');

// Return job by ID.
Route::get('/api/jobPosts/{id}/', 'APIController@getJobPost')->name('getJobPost');

/* Return jobs by state. */
Route::get('/api/jobPosts/state/{state}', 'APIController@getJobPostsByState')->name('getJobPostsByState');

/* Return all jobs. */
Route::get('/api/jobPosts/', 'APIController@getAllJobPosts')->name('getAllJobPosts');
