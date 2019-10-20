@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1 align="center" class="mt-3 mb-3">About us</h1>

    <br>
    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <div class="panel-heading"><strong>Group54 Team</strong></div>

                <div class="row" style="padding: 12px;">


                    <div class="col-md-12 col-xs-2">

                        <!-- Gallery of Group 54 members -->
                        <div class="row" align="center" style="padding: 8px 12px;">
                            <div class="col-md-3 col-sm-6 col-xs-2 col-lg-3 col-xl-3">
                                <div class="caption"><h5>Connor Borbiro</h5>
                                <img src="{{ asset('img/connor.jpg') }}" alt="Connor"
                                     style="height: 220px; width: 220px; display: block;">
                                </div>

                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-2 col-lg-3 col-xl-3">
                                <div class="caption"><h5>Anthony Pace</h5>
                                <img src="{{ asset('img/soccer.jpg') }}" alt="Anthony"
                                     style="height: 220px; width: 220px; display: block;">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-2 col-lg-3 col-xl-3">
                                <div class="caption"><h5>Jason Keen</h5>
                                <img src="{{ asset('img/jason.png') }}" alt="Jason"
                                     style="height: 220px; width: 220px; display: block;">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-2 col-lg-3 col-xl-3">
                                <div class="caption"><h5>Zhengjie Jiang</h5>
                                <img src="{{ asset('img/feelssadfrog.jpeg') }}" alt="Jeff"
                                     style="height: 220px; width: 220px; display: block;">
                                </div>
                            </div>

                        </div>
                    </div>

                </div> <!-- end of images-->

                <div class="panel-body" align="center">
                </div>
            </div>
        </div>
    </div>

@endsection



