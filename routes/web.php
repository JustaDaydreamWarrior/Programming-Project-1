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
use App\JobPost;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Auth\EmployerLoginController;
// Controller Routes
Route::get('/', 'PagesController@index')->name('home');

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

Route::post('/jobPosts/update', 'JobPostsController@update')->name('updateJob');

// Employer Specific Routes
Route::get('/employer/login', 'Auth\EmployerLoginController@showLoginForm')->name('employer.login');

Route::post('/employer/login', 'Auth\EmployerLoginController@login')->name('employer.login.submit');

Route::get('/employer/register', 'Auth\EmployerRegisterController@showRegisterForm')->name('employer.register');

Route::post('/employer/register', 'Auth\EmployerRegisterController@create')->name('employer.register.submit');

Route::get('/employer/logout', function (){abort(403);}) ;
Route::post('/employer/logout', 'Auth\EmployerLoginController@logout')->name('employer.logout');

Route::get('/employer/dashboard', 'EmployerController@dashboard')->name('employer.dashboard');
Route::get('/employer', 'EmployerController@index')->name('employer.home');

Route::get('/employer/employer_matches', 'EmployerController@matchingJobSeekers')->name('employer.matches');



// Admin routes
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/admin/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
Route::post('/admin/register', 'Auth\AdminRegisterController@create')->name('admin.register.submit');

Route::get('/admin/logout', function (){abort(403);}) ;
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin', 'AdminController@index')->name('admin.home');

Route::get('/employer', 'EmployerController@index')->name('employer.home');

//Job Seeker Profile Routes
Route::get('/jobseekerprofiles', 'JobSeekerProfileHomeController@index')->name('jobseeker_profile');

Route::get('/jobseeker/{name}', 'JobSeekerProfileTemplateController@show')->name('jobseeker_profile.show');

Route::get('/profiles{id}', 'JobSeekerProfileEditController@profile')->name('user.profile');

Route::get('edit/profiles/', 'JobSeekerProfileEditController@edit')->name('user.edit');

Route::post('edit/profiles/', 'JobSeekerProfileEditController@update')->name('user.update');

//Employer Profile Routes
Route::get('/employerprofiles', 'EmployerProfileHomeController@employerindex')->name('employer_profile');

Route::get('/employer/{company_name}', 'EmployerProfileTemplateController@employershow')->name('employer_profile.show');

Route::get('edit/employerprofiles/', 'EmployerProfileEditController@edit')->name('employer.profile_edit');

Route::post('edit/employerprofiles/', 'EmployerProfileEditController@update')->name('employer.update');

// Authentication Routes
Auth::routes();
//Search Bar in job listings
Route::post('/searchemployer', function(){
    $q = Input::get('q');
    if($q != ' '){
        $employer = Employer::where('company_name', 'LIKE', '%' . $q . '%')
            ->orWhere('contact_email', 'LIKE', '%' . $q . '%')
            ->get();
        if(count($employer) > 0)
            return view('pages/searchemployerresult')->withDetails($employer)->withQuery($q);
    }
    return view('pages/searchemployerresult')->withMessage("No users were found in the database. Try again!");
});

Route::post('/searchjob', function(){
    $q = Input::get('q');
    if($q != ' '){
        $jobpost = JobPost::where('title', 'LIKE', '%' . $q . '%')
            ->orWhere('organisation', 'LIKE', '%' . $q . '%')
            ->get();
        if(count($jobpost) > 0)
            return view('pages/searchjobresult')->withDetails($jobpost)->withQuery($q);
    }
    return view('pages/searchjobresult')->withMessage("No jobs were found in the database. Try again!");
});

// API Routes

// API Routes (matchmaking) //
// Return currently authenticated user.
    Route::get('/api/user', 'APIController@getUser')->name('getUser');
// Return job by ID.
    Route::get('/api/jobPosts/{id}/', 'APIController@getJobPost')->name('getJobPost');
// Return all jobs.
    Route::get('/api/jobPosts/', 'APIController@getAllJobPosts')->name('getAllJobPosts');
// Return jobs by filter.
    Route::get('/api/jobPosts/state/{state}', 'APIController@getJobPostsByFilter')->name('getJobPosts');
// Return all users.
    Route::get('/api/users/', 'EmployerAPIController@getAllUsers')->name('getAllUsers');
// Return users by filter.
    Route::get('/api/users/state/{state}', 'EmployerAPIController@getUsersByFilter')->name('getUsers');







