@extends('layouts.app')

@section('content')
    <h1 align="center" class="mt-3 mb-3">Job Listings</h1>
<br>
    <br>
    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <div class="panel-heading"><strong>Jobs</strong></div>
                <div class="">
                {{--Search Bar for Job search --}}
                <div class="searchBar">
                    <form action="/searchjob" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                   placeholder="Search for a job">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-secondary" style="align: center">
                                    {{ __('Search') }}</button>
                              </span>
                        </div>
                    </form>
                </div>
                </div>

                {{--Panel to display list of available jobPosts--}}
                <div class="jobPanel">

                    @if(count($jobPosts) > 0)
                        @foreach($jobPosts as $jobPost)
                            <div class="card card-body bg-light p-3 mt-3 mb-3">

                                <h3><a href="/jobPosts/{{$jobPost->id}}">{{$jobPost->title}}</a></h3>
                                {{-- <small>Written on {{$jobPost->created_at}} by {{$jobPost->company_name}}</small> --}}
                                <small>Written on {{$jobPost->created_at}} by {{$jobPost->organisation}}</small>
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
    </div>
@endsection
