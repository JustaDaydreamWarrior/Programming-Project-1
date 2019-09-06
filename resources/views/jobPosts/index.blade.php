@extends('layouts.app')

@section('content')
    <h1 align="center" class="mt-3 mb-3">Current Job Listings</h1>

    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default">
                @if(count($jobPosts) > 0)
                    @foreach($jobPosts as $jobPost)
                        <div class="card card-body bg-light p-3 mt-3 mb-3">
                        
                            <h3><a href="/jobPosts/{{$jobPost->id}}">{{$jobPost->title}}</a></h3>
                            <small>Written on {{$jobPost->created_at}} by {{$jobPost->user->name}}</small>
                            <small>Updated on {{$jobPost->updated_at}}</small>

                        </div>
                    @endforeach
                    {{-- fixed pagination here. It was not showing because the following line of code was missing
                    and the variable names in @foreach were the same and the program does not recognise it --}}
                    {{ $jobPosts->links() }}
                @else
                    <p>No Job listings Found</p>
                @endif
                
            </div>
        </div>
    </div>
@endsection