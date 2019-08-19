@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1 align="center">About us</h1>

    <br>
    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <div class="panel-heading"><strong>Group54 Team</strong></div>

                <div class="row" style="padding: 12px;">
                    <div class="col-md-12 col-xs-2">
                        <div class="divider"></div>
                        <!-- Gallery of Group 54 members -->
                        <div class="row" align="center" style="padding: 8px 12px;">
                            <div class="col-md-3 col-sm-6 col-xs-2 col-lg-3 col-xl-3">
                                <a href="#" class="thumbnail">
                                    <img src="{{ asset('img/connor.jpg') }}" alt="Connor"
                                         style="height: 120px; width: 120px; display: block;">
                                </a>
                                <div class="caption"><h5>Connor Borbiro</h5>
                                </div>

                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-2 col-lg-3 col-xl-3">
                                <a href="#" class="thumbnail">
                                    <img src="{{ asset('img/placeholder.png') }}" alt="Anthony"
                                         style="height: 120px; width: 120px; display: block;">
                                </a>
                                <div class="caption"><h5>Anthony Pace</h5>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-2 col-lg-3 col-xl-3">
                                <a href="#" class="thumbnail">
                                    <img src="{{ asset('img/placeholder.png') }}" alt="Jason"
                                         style="height: 120px; width: 120px; display: block;">
                                </a>
                                <div class="caption"><h5>Jason Keen</h5>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-2 col-lg-3 col-xl-3">
                                <a href="#" class="thumbnail">
                                    <img src="{{ asset('img/placeholder.png') }}" alt="Jeff"
                                         style="height: 120px; width: 120px; display: block;">
                                </a>
                                <div class="caption"><h5>Zhengjie Jiang</h5>
                                </div>
                            </div>

                        </div>
                        <div class="divider"></div>
                    </div>

                </div> <!-- end of images-->

                    <div class="panel-body" align="center">
                        <p> Group54 was formed in Semester 2 of 2019 in order to complete a Programming Project at RMIT </p>
                        <p> This website is the result of the team's work</p>
                    </div>
            </div>
        </div>
    </div>

@endsection



