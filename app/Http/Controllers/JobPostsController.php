<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\JobPost;
use Auth;
use App\Employer;
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
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'title' => 'required',
    //         'organisation' => 'required',
    //         'estSalary' => 'required',
    //         'email' => 'required',
    //         'description' => 'required',
    //         'state' => 'required|string|in:NSW,ACT,VIC,QLD,SA,WA,NT,TAS',
    //         'city' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
    //         //Skills
    //         'minEdu' => 'required|integer|min:0|max:10',
    //         'minExp' => 'required|integer|min:0|max:100',
    //         'java' => 'required|boolean',
    //         'c' => 'required|boolean',
    //         'c#' => 'required|boolean',
    //         'c++' => 'required|boolean',
    //         'php' => 'required|boolean',
    //         'html' => 'required|boolean',
    //         'css' => 'required|boolean',
    //         'python' => 'required|boolean',
    //         'javascript' => 'required|boolean',
    //         'sql' => 'required|boolean',
    //         'windows10' => 'required|boolean',
    //         'windows7' => 'required|boolean',
    //         'windowsOld' => 'required|boolean',
    //         'windowsServer' => 'required|boolean',
    //         'macOS' => 'required|boolean',
    //         'linux' => 'required|boolean',
    //         'bash' => 'required|boolean',
    //         'ciscoSystems' => 'required|boolean',
    //         'microsoftOffice' => 'required|boolean',
    //         'ruby' => 'required|boolean',
    //         'powershell' => 'required|boolean',
    //         'rust' => 'required|boolean',
    //         'iOS' => 'required|boolean',
    //         'adobe' => 'required|boolean',
    //         'cloud' => 'required|boolean'
    //     ]);
    //     //update $jobPosts
    //     $jobPosts = JobPost::find($id);
    //     $jobPosts->title = $request->input('title');
    //     $jobPosts->organisation = $request->input('organisation');
    //     $jobPosts->estSalary = $request->input('estSalary');
    //     $jobPosts->email = $request->input('email');
    //     $jobPosts->description = $request->input('description');
    //     $jobPosts->state = $request->input('state');
    //     $jobPosts->city = $request->input('city');
    //     $jobPosts->minExp = $request->input('minExp');
    //     $jobPosts->minEdu = $request->input('minEdu');
    //     $jobPosts->java = $request->input('java');
    //     $jobPosts->cplus = $request->input('cplus');
    //     $jobPosts->csharp = $request->input('csharp');
    //     $jobPosts->php = $request->input('php');
    //     $jobPosts->html = $request->input('html');
    //     $jobPosts->css = $request->input('css');
    //     $jobPosts->python = $request->input('python');
    //     $jobPosts->javascript = $request->input('javascript');
    //     $jobPosts->sql = $request->input('sql');
    //     $jobPosts->windows10 = $request->input('windows10');
    //     $jobPosts->windowsOld = $request->input('windowsOld');
    //     $jobPosts->windowsServer = $request->input('windowsServer');
    //     $jobPosts->macOS = $request->input('macOS');
    //     $jobPosts->linux = $request->input('linux');
    //     $jobPosts->bash = $request->input('bash');
    //     $jobPosts->ciscoSystems = $request->input('ciscoSystems');
    //     $jobPosts->microsoftOffice = $request->input('microsoftOffice');
    //     $jobPosts->ruby = $request->input('ruby');
    //     $jobPosts->powershell = $request->input('powershell');
    //     $jobPosts->rust = $request->input('rust');
    //     $jobPosts->iOS = $request->input('iOS');
    //     $jobPosts->adobe = $request->input('adobe');
    //     $jobPosts->cloud = $request->input('cloud');
    //     $jobPosts->save();
    //     return redirect('/jobPosts')->with('success', 'Listing updated!');
    // }
    public function update(Request $request) {
        $jobPosts = JobPost::find(Auth::user()->id);
        if ($jobPosts) {
            $validate = null;
            if (Auth::user()->email === $request['email']){
                $validate = $request->validate([
                    'title' => 'required|min:1',
                    'email' => '|email|min:2',
                    'state' => 'required|string|in:NSW,ACT,VIC,QLD,SA,WA,NT,TAS',
                    'city' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
                    // 'minEdu' => 'required|integer|min:0|max:10',
                    'minExp' => 'required|integer|min:0|max:100',
                    'java' => 'required|boolean',
                    'c' => 'required|boolean',
                    // 'csharp' => 'required|boolean',
                    // 'cplus' => 'required|boolean',
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
                    // 'android' => 'required|boolean',
                    'unix' => 'required|boolean',
                    'ciscoSystems' => 'required|boolean',
                    'microsoftOffice' => 'required|boolean',
                    'ruby' => 'required|boolean',
                    'powershell' => 'required|boolean',
                    'rust' => 'required|boolean',
                    'iOS' => 'required|boolean',
                    'adobe' => 'required|boolean',
                    'cloud' => 'required|boolean'
                ]);
            } else {
                $validate = $request->validate([
                    'title' => 'required|min:1',
                    'email' => '|email|min:2',
                    'state' => 'required|string|in:NSW,ACT,VIC,QLD,SA,WA,NT,TAS',
                    'city' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
                    // 'minEdu' => 'required|integer|min:0|max:10',
                    'minExp' => 'required|integer|min:0|max:100',
                    'java' => 'required|boolean',
                    'c' => 'required|boolean',
                    // 'csharp' => 'required|boolean',
                    // 'cplus' => 'required|boolean',
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
                    // 'android' => 'required|boolean',
                    'macOS' => 'required|boolean',
                    'linux' => 'required|boolean',
                    'bash' => 'required|boolean',
                    'unix' => 'required|boolean',
                    'ciscoSystems' => 'required|boolean',
                    'microsoftOffice' => 'required|boolean',
                    'ruby' => 'required|boolean',
                    'powershell' => 'required|boolean',
                    'rust' => 'required|boolean',
                    'iOS' => 'required|boolean',
                    'adobe' => 'required|boolean',
                    'cloud' => 'required|boolean'
                ]);
            }
            if ($validate) {
                $jobPosts->title = $request['title'];
                $jobPosts->email = $request['email'];
                $jobPosts->state = $request['state'];
                $jobPosts->city = $request['city'];
                // $jobPosts->minEdu = $request['minEdu'];
                $jobPosts->minExp = $request['minExp'];
                $jobPosts->java = $request['java'];
                $jobPosts->c = $request['c'];
                // $jobPosts->cplus = $request['cplus'];
                // $jobPosts->csharp = $request['csharp'];
                $jobPosts->php = $request['php'];
                $jobPosts->html = $request['html'];
                $jobPosts->css = $request['css'];
                $jobPosts->python = $request['python'];
                $jobPosts->javascript = $request['javascript'];
                $jobPosts->sql = $request['sql'];
                $jobPosts->windows10 = $request['windows10'];
                $jobPosts->windows7 = $request['windows7'];
                $jobPosts->windowsOld = $request['windowsOld'];
                $jobPosts->windowsServer = $request['windowsServer'];
                $jobPosts->macOS = $request['macOS'];
                $jobPosts->linux = $request['linux'];
                $jobPosts->bash = $request['bash'];
                $jobPosts->unix = $request['unix'];
                // $jobPosts->android = $request['android'];
                $jobPosts->ciscoSystems = $request['ciscoSystems'];
                $jobPosts->microsoftOffice = $request['microsoftOffice'];
                $jobPosts->ruby = $request['ruby'];
                $jobPosts->powershell = $request['powershell'];
                $jobPosts->rust = $request['rust'];
                $jobPosts->iOS = $request['iOS'];
                $jobPosts->adobe = $request['adobe'];
                $jobPosts->cloud = $request['cloud'];
                $jobPosts->save();
                $request->session()->flash('success', 'Your joblisting has been updated!');
                return redirect()->route('jobPosts-create');
            }
            else {
                return redirect()->back();
            }
            $jobPosts->title = $request['title'];
            $jobPosts->email = $request['email'];
            $jobPosts->state = $request['state'];
            $jobPosts->city = $request['city'];
            // $jobPosts->minEdu = $request['minEdu'];
            $jobPosts->minExp = $request['minExp'];
            $jobPosts->java = $request['java'];
            $jobPosts->c = $request['c'];
            // $jobPosts->cplus = $request['cplus'];
            // $jobPosts->csharp = $request['csharp'];
            $jobPosts->php = $request['php'];
            $jobPosts->html = $request['html'];
            $jobPosts->css = $request['css'];
            $jobPosts->python = $request['python'];
            $jobPosts->javascript = $request['javascript'];
            $jobPosts->sql = $request['sql'];
            // $jobPosts->android = $request['android'];
            $jobPosts->windows10 = $request['windows10'];
            $jobPosts->windows7 = $request['windows7'];
            $jobPosts->windowsOld = $request['windowsOld'];
            $jobPosts->windowsServer = $request['windowsServer'];
            $jobPosts->macOS = $request['macOS'];
            $jobPosts->linux = $request['linux'];
            $jobPosts->bash = $request['bash'];
            $jobPosts->unix = $request['unix'];
            $jobPosts->ciscoSystems = $request['ciscoSystems'];
            $jobPosts->microsoftOffice = $request['microsoftOffice'];
            $jobPosts->ruby = $request['ruby'];
            $jobPosts->powershell = $request['powershell'];
            $jobPosts->rust = $request['rust'];
            $jobPosts->iOS = $request['iOS'];
            $jobPosts->adobe = $request['adobe'];
            $jobPosts->cloud = $request['cloud'];
            $jobPosts->save();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
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