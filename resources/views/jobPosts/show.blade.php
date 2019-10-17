@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <h1>{{$jobPosts->title}}</h1>
                <br>
                <div>
                    {!!$jobPosts->organisation!!}
                </div>
                <div>
                    {!!$jobPosts->estSalary!!}
                </div>
                <div>
                    {!!$jobPosts->description!!}
                </div>
                {{-- <small>Written on {{$jobPosts->created_at}} by {{$jobPosts->user->company_name}}</small> --}}
                <small>Written on {{$jobPosts->created_at}} by {{$jobPosts->organisation}}</small>
                <br>
                <small>Updated on {{$jobPosts->updated_at}}</small>
                <hr>
                <div class="row">
                    <div class="col">
                        <a href="/jobPosts" class="btn btn-outline-dark mt-3 mb-3">Back</a>
                    </div>
                    @if(!Auth::guest())
                        {{-- @if(Auth::user()->id == $jobPosts->user_id) --}}
                        @if(Auth::guard('employer')->user()->id == $jobPosts->user_id)
                            <div class="col">
                                <a href="/jobPosts/{{$jobPosts->id}}/edit" class="btn btn-outline-dark mt-3 mb-3">Edit</a>
                            </div>
                            <div class="col mt-3 mb-3">

                                {!!Form::open(['action' => ['JobPostsController@destroy', $jobPosts->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
