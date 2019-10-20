@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="panel-heading"><strong>Your Dashboard</strong></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p style="text-align: center">Welcome to your personal dashboard {{ Auth::user()->name }}!<br>
                            Let's get started!</p>

                    </div>
                </div>

                <br>


{{--                --}}{{-- Mini Job Listings Panel. Shows all the job listing the user has created --}}
{{--                <div class="panel paneldefault">--}}
{{--                    <div class="panel-heading">Your Job Listings</div>--}}

{{--                    <div class="panel-body">--}}
{{--                        <a href="/jobPosts/create" class="btn btn-primary">Create Job listing</a>--}}
{{--                        @if(count($jobPosts) > 0)--}}
{{--                            <table class="table table-striped">--}}
{{--                                <tr>--}}
{{--                                    <th>Title</th>--}}
{{--                                    <th></th>--}}
{{--                                    <th></th>--}}
{{--                                </tr>--}}

{{--                                --}}{{-- Buttons for removing and editing user's listings --}}
{{--                                @foreach($jobPosts as $jobPost)--}}
{{--                                    <tr>--}}
{{--                                        <th>{{$jobPost->title}}</th>--}}
{{--                                        <th><a href="/jobPosts/{{$jobPost->id}}/edit"--}}
{{--                                               class="btn btn-primary">Edit</a>--}}
{{--                                        </th>--}}
{{--                                        <th>--}}
{{--                                        {!!Form::open(['action' => ['JobPostsController@destroy', $jobPost->id], 'method' => 'POST'])!!}--}}
{{--                                        {{Form::hidden('_method', 'DELETE')}}--}}
{{--                                        {{Form::submit('Delete', ['class' => 'btn btn-danger '])}}--}}
{{--                                        {!!Form::close()!!}--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            </table>--}}
{{--                        @else--}}
{{--                            <p>You have no job listings</p>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}


            </div>
        </div>
    </div>
@endsection
