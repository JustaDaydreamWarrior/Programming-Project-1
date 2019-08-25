@extends('layouts.app')

@section('content')
    <h1 align="center" class="mt-3 mb-3">Current Job Listings</h1>

    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                @if(count($jobPosts) > 0)
                    @foreach($jobPosts as $jobPosts)
                        <div class="card card-body bg-light p-3 mt-3 mb-3">
                            <h3><a href="/jobPosts/{{$jobPosts->id}}">{{$jobPosts->title}}</a></h3>
                            <small>Written on {{$jobPosts->created_at}}</small>
                            <small>Updated on {{$jobPosts->updated_at}}</small>
                        </div>
                    @endforeach
                @else
                    <p>No Job listings Found</p>
                @endif
            </div>
        </div>
    </div>
@endsection