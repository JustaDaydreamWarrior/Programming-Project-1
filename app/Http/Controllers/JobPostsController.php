<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPost;
use Auth;

class JobPostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employer', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$jobPosts = Post::all();
        $jobPosts = JobPost::orderBy('created_at', 'desc')->paginate(5); //change pagination here
        return view('jobPosts/index')->with('jobPosts', $jobPosts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobPosts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'organisation' => 'required',
            'estSalary' => 'required',
            'email' => 'required',
            'description' => 'required',
            'state' => 'required|string|in:NSW,ACT,VIC,QLD,SA,WA,NT,TAS',
            'city' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
            //Skills
            'minEdu' => 'required|integer|min:0|max:10',
            'minExp' => 'required|integer|min:0|max:100',
            'java' => 'required|boolean',
            'c' => 'required|boolean',
            'csharp' => 'required|boolean',
            'cplus' => 'required|boolean',
            'php' => 'required|boolean',
            'html' => 'required|boolean',
            'css' => 'required|boolean',
            'python' => 'required|boolean',
            'javascript' => 'required|boolean',
            'sql' => 'required|boolean',
            'windows10' => 'required|boolean',
            'windows7' => 'required|boolean',
            'windowsOld' => 'required|boolean',
            'windowsServer' => 'required|boolean',
            'macOS' => 'required|boolean',
            'linux' => 'required|boolean',
            'bash' => 'required|boolean',
            'ciscoSystems' => 'required|boolean',
            'microsoftOffice' => 'required|boolean',
            'ruby' => 'required|boolean',
            'powershell' => 'required|boolean',
            'rust' => 'required|boolean',
            'iOS' => 'required|boolean',
            'adobe' => 'required|boolean',
            'cloud' => 'required|boolean'
        ]);

        //create jobPost
        $jobPosts = new JobPost;
        $jobPosts->employer_id = auth()->user()->id;
        $jobPosts->title = $request->input('title');
        $jobPosts->organisation = $request->input('organisation');
        $jobPosts->estSalary = $request->input('estSalary');
        $jobPosts->email = $request->input('email');
        $jobPosts->description = $request->input('description');
        $jobPosts->state = $request->input('state');
        $jobPosts->city = $request->input('city');
        $jobPosts->minExp = $request->input('minExp');
        $jobPosts->minEdu = $request->input('minEdu');
        $jobPosts->java = $request->input('java');
        $jobPosts->cplus = $request->input('cplus');
        $jobPosts->csharp = $request->input('csharp');
        $jobPosts->php = $request->input('php');
        $jobPosts->html = $request->input('html');
        $jobPosts->css = $request->input('css');
        $jobPosts->python = $request->input('python');
        $jobPosts->javascript = $request->input('javascript');
        $jobPosts->sql = $request->input('sql');
        $jobPosts->windows10 = $request->input('windows10');
        $jobPosts->windowsOld = $request->input('windowsOld');
        $jobPosts->windowsServer = $request->input('windowsServer');
        $jobPosts->macOS = $request->input('macOS');
        $jobPosts->linux = $request->input('linux');
        $jobPosts->bash = $request->input('bash');
        $jobPosts->ciscoSystems = $request->input('ciscoSystems');
        $jobPosts->microsoftOffice = $request->input('microsoftOffice');
        $jobPosts->ruby = $request->input('ruby');
        $jobPosts->powershell = $request->input('powershell');
        $jobPosts->rust = $request->input('rust');
        $jobPosts->iOS = $request->input('iOS');
        $jobPosts->adobe = $request->input('adobe');
        $jobPosts->cloud = $request->input('cloud');

        $jobPosts->save();

        return redirect('/jobPosts')->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobPosts = JobPost::find($id);
        return view('jobPosts/show')->with('jobPosts', $jobPosts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobPosts = JobPost::find($id);

        // check for correct user (preventing unauthorized editing and deleting)
        if (Auth::guard('employer')->user()->id !== $jobPosts->employer_id) {
            return redirect('/jobPosts')->with('error', 'Unauthorized Page');
        }
        return view('jobPosts/edit')->with('jobPosts', $jobPosts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'organisation' => 'required',
            'estSalary' => 'required',
            'email' => 'required',
            'description' => 'required',
            'state' => 'required|string|in:NSW,ACT,VIC,QLD,SA,WA,NT,TAS',
            'city' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
            //Skills
            'minEdu' => 'required|integer|min:0|max:10',
            'minExp' => 'required|integer|min:0|max:100',
            'java' => 'required|boolean',
            'c' => 'required|boolean',
            'c#' => 'required|boolean',
            'c++' => 'required|boolean',
            'php' => 'required|boolean',
            'html' => 'required|boolean',
            'css' => 'required|boolean',
            'python' => 'required|boolean',
            'javascript' => 'required|boolean',
            'sql' => 'required|boolean',
            'windows10' => 'required|boolean',
            'windows7' => 'required|boolean',
            'windowsOld' => 'required|boolean',
            'windowsServer' => 'required|boolean',
            'macOS' => 'required|boolean',
            'linux' => 'required|boolean',
            'bash' => 'required|boolean',
            'ciscoSystems' => 'required|boolean',
            'microsoftOffice' => 'required|boolean',
            'ruby' => 'required|boolean',
            'powershell' => 'required|boolean',
            'rust' => 'required|boolean',
            'iOS' => 'required|boolean',
            'adobe' => 'required|boolean',
            'cloud' => 'required|boolean'
        ]);

        //update $jobPosts
        $jobPosts = JobPost::find($id);
        $jobPosts->title = $request->input('title');
        $jobPosts->organisation = $request->input('organisation');
        $jobPosts->estSalary = $request->input('estSalary');
        $jobPosts->email = $request->input('email');
        $jobPosts->description = $request->input('description');
        $jobPosts->state = $request->input('state');
        $jobPosts->city = $request->input('city');
        $jobPosts->minExp = $request->input('minExp');
        $jobPosts->minEdu = $request->input('minEdu');
        $jobPosts->java = $request->input('java');
        $jobPosts->cplus = $request->input('cplus');
        $jobPosts->csharp = $request->input('csharp');
        $jobPosts->php = $request->input('php');
        $jobPosts->html = $request->input('html');
        $jobPosts->css = $request->input('css');
        $jobPosts->python = $request->input('python');
        $jobPosts->javascript = $request->input('javascript');
        $jobPosts->sql = $request->input('sql');
        $jobPosts->windows10 = $request->input('windows10');
        $jobPosts->windowsOld = $request->input('windowsOld');
        $jobPosts->windowsServer = $request->input('windowsServer');
        $jobPosts->macOS = $request->input('macOS');
        $jobPosts->linux = $request->input('linux');
        $jobPosts->bash = $request->input('bash');
        $jobPosts->ciscoSystems = $request->input('ciscoSystems');
        $jobPosts->microsoftOffice = $request->input('microsoftOffice');
        $jobPosts->ruby = $request->input('ruby');
        $jobPosts->powershell = $request->input('powershell');
        $jobPosts->rust = $request->input('rust');
        $jobPosts->iOS = $request->input('iOS');
        $jobPosts->adobe = $request->input('adobe');
        $jobPosts->cloud = $request->input('cloud');
        $jobPosts->save();

        return redirect('/jobPosts')->with('success', 'Listing updated!');
    }

    /* Show matches page. */
    public function matchingJobs(){
        return view('pages/matches');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobPosts = JobPost::find($id);
        $jobPosts->delete();
        return redirect('/jobPosts')->with('success', 'Job Listing Removed');
    }
}
