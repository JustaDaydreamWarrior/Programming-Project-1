@extends('layouts.app')

@section('content')

    <h1 align="center" class="mt-3 mb-3">Job Matches</h1>


    <div class="container">

        <div id="filters" class="panel panel-default">
            <div class="panel-heading">Filters</div>
            <div class="panel-body">
                <div class="form-group" align="center">
                    <label for="state">State/Territory</label>

                    <div class="col-md-6" >
                        <select id="state" class="form-control">
                            <option value="">Any</option>
                            <option value="vic">Victoria</option>
                            <option value="nsw">New South Wales</option>
                            <option value="sa">South Australia</option>
                            <option value="qld">Queensland</option>
                            <option value="wa">Western Australia</option>
                            <option value="tas">Tasmania</option>
                            <option value="act">Australian Capital Territory</option>
                            <option value="nt">Northern Territory</option>
                        </select>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-md-offset-10">
            <hr>
            <div class="card card-body bg-secondary p-3 mt-6 mb-6">
                {{--Display an error if javascript isn't working, or enabled--}}
                <div id="noscript" align="center">
                    <br><br>
                    <p><i style="font-size: 200px" class="" hidden="true"></i></p>
                    <br>
                    <h2>JavaScript Error</h2>
                    <p>An issue with javascript was found, please make sure javascript is enabled</p>
                    <br><br>
                </div>
                {{--Loading div. Used until first match is loaded --}}
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
                    <p><i style="font-size: 150px" class="" hidden="true"></i></p>
                    <br>
                    <h2>No Matches Found.</h2>
                    <br><br>
                </div>
                {{--Undefined error div--}}
                <div id="error" style="display: none" align="center">
                    <br><br>
                    <p><i style="font-size: 150px" class="" hidden="true"></i></p>
                    <br>
                    <h2>Error.</h2>
                    <p>An error occurred.</p>
                    <br><br>
                </div>
                {{-- Match Div; div that holds a matched job --}}
                <div id="jobposts"></div>
            </div>
        </div>
    </div>
@endsection
