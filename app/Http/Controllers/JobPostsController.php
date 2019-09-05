<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPost;

class JobPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$jobPosts = Post::all();
        $jobPosts = JobPost::orderBy('created_at', 'desc')->paginate(3); //change pagination here
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'organisation' => 'required',
            'estSalary' => 'required',
            'email' => 'required',
            'description' => 'required'
        ]);

        //create jobPost
        $jobPosts = new JobPost;
        $jobPosts->user_id = auth()->user()->id;
        $jobPosts->title = $request->input('title');
        $jobPosts->organisation = $request->input('organisation');
        $jobPosts->estSalary = $request->input('estSalary');
        $jobPosts->email = $request->input('email');
        $jobPosts->description = $request->input('description');
        $jobPosts->save();

        return redirect('/jobPosts')->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobPosts = JobPost::find($id);
        return view('jobPosts/edit')->with('jobPosts', $jobPosts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'organisation' => 'required',
            'estSalary' => 'required',
            'email' => 'required',
            'description' => 'required'
        ]);

        //update $jobPosts
        $jobPosts = JobPost::find($id);
        $jobPosts->title = $request->input('title');
        $jobPosts->organisation = $request->input('organisation');
        $jobPosts->estSalary = $request->input('estSalary');
        $jobPosts->email = $request->input('email');
        $jobPosts->description = $request->input('description');
        $jobPosts->save();

        return redirect('/jobPosts')->with('success', 'Listing updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobPosts = JobPost::find($id);
        $jobPosts->delete();
        return redirect('/jobPosts')->with('success', 'Job Listing Removed');
    }
}
