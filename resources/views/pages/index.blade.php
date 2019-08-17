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
                                                <p> Handshake is a web application dedicated to assisting employers and job seekers to connect with one another with the click of a button!</p><br>

                                        </div>
                                </div>

                                <div class="panel panel-default">
                                        <div class="panel-heading"><strong>Algorithmic job matchmaking</strong></div>

                                        <div class="panel-body" align="center">
                                                <p>In order to match the best possible employee, or most suitable employer,
                                                    we utilize an advanced matchmaking algorithm that takes many of your skills, qualifications,
                                                    location and more into account to provide you with the best possible employer or employee suggestions!</p>

                                                <p>After you register, and job seekers apply to your posted job advertisements,

                                                    For employers, any applicants that match one or more your desired skills or qualifications will be listed in descending order based on the amount of requirements your
                                                    job and their self-reported <strong>skillset</strong>, <strong>experience</strong>, and <strong>education</strong>.</p>


                                        </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading"><strong>Benefits of using Handshake</strong></div>

                                        <div class="panel-body" align="center">
                                            <strong>Employers</strong>
                                            <p>&bull; Find suitably skilled employees at the click of a button
                                            <p>&bull;
                                            <p>&bull;
                                            <p>&bull;
                                            <br>
                                            <strong>Job Seekers</strong>
                                            <p>&bull;
                                            <p>&bull;
                                            <p>&bull;
                                            <p>&bull;
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
@endsection

