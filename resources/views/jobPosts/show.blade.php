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
                <small>Written on {{$jobPosts->created_at}}</small>
                <br>
                <small>Updated on {{$jobPosts->updated_at}}</small>
                <hr>
                <div class="row">
                    <div class="col">
                        <a href="/jobPosts/{{$jobPosts->id}}/edit" class="btn btn-outline-dark mt-3 mb-3">Edit</a>
                    </div>
                    <a href="/jobPosts" class="btn btn-outline-dark mt-3 mb-3">Back</a>
                    <div class="col mt-3 mb-3">

                        {!!Form::open(['action' => ['JobPostsController@destroy', $jobPosts->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

