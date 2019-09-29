@extends('layouts.app')

@section('content')

    <h1 align="center" class="mt-3 mb-3">Job Matches</h1>

    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <hr>
            <div class="card card-body bg-secondary p-3 mt-6 mb-6">
                {{--Display an error if javascript isn't working, or enabled--}}
                <div id="noscript" align="center">
                    <br><br>
                    <p><i style="font-size: 200px" class="" aria-hidden="true"></i></p>
                    <br>
                    <h2>JavaScript Error</h2>
                    <p>An issue with javascript was found, please make sure javascript is enabled in order to utilize our matchmaking service..</p>
                    <br><br>
                </div>
                {{--Loading div. Used to display loading animation until first match is loaded to page. --}}
                <div id="loading" style="display: none" align="center">
                    <br><br>
                    <p><i style="font-size: 150px" class=""></i></p>
                    <br>
                    <h2>Loading...</h2>
                    <br><br>
                </div>
                {{--No matches found div--}}
                <div id="nomatch" style="display: none" align="center">
                    <br><br>
                    <p><i style="font-size: 150px" class="" aria-hidden="true"></i></p>
                    <br>
                    <h2>No Matches Found.</h2>
                    <p>Try again later.</p>
                    <br><br>
                </div>
                {{--Undefined error div--}}
                <div id="error" style="display: none" align="center">
                    <br><br>
                    <p><i style="font-size: 150px" class="" aria-hidden="true"></i></p>
                    <br>
                    <h2>Error.</h2>
                    <p>An error occurred.</p>
                    <br><br>
                </div>
                {{-- Match Div; div that holds a matched job --}}
                <div id="jobseeker"></div>
            </div>
        </div>
    </div>
@endsection
