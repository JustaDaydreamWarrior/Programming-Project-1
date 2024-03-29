@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-10">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Welcome</strong></div>

                    <div class="panel-body" align="center">
                        <img src="{{ asset('img/transparent_icon.png') }}" alt="icon"
                             style="height: 120px; width: 120px; display: block;">
                        <p> Handshake is a web application dedicated to assisting employers and job seekers to connect
                            with one another with the click of a button!</p><br>

                        <p> In order to get started, login, then navigate to the matchmaking page!, </p><br>

                    </div>
                </div>
                <div class="col-md-6" style="float: right;">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Algorithmic job matchmaking</strong></div>
                        <div class="panel-body" align="left">
                            <div align="center">
                                <br>
                                <img src="{{ asset('img/connection.png') }}" alt="icon"
                                     style="height: 120px; width: 120px; display: block;">
                                <br>
                            </div>
                            <p>In order to match the best possible employee, or most suitable employer,
                                we utilize an advanced matchmaking algorithm that takes many of your skills,
                                qualifications,
                                location and more into account to provide you with the best possible employer or
                                employee
                                suggestions! Start your search today!</p>
                            <br>
                        </div>

                    </div>
                </div>
                <div class="col-md-6" style="float: left;">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>How to get started?</strong></div>
                        <div class="panel-body" align="left">
                            <strong>Employers:</strong>
                            <p>&bull; Find suitably skilled employees at the click of a button
                            <p>&bull; Cuts down on time wasted searching for the right applicant manually
                            <p>&bull; Helps ensure that employees you select have verifiable and up to date
                                qualifications!
                                <br>
                                <br>
                                <strong>Job Seekers:</strong>
                            <p>&bull; Find an employer that suits your skills and/or location!
                            <p>&bull; Order matched job applications based on the rating of the employer; See the best
                                first!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

