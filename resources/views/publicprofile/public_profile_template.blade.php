@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <h1>My Profile Page</h1>
                <br>
                <br>
                <h1>First Name</h1>
                <p>{{$user->name}}</p>
                <br>
                <div>
                    <h1>User ID</h1>
                    {!!$user->id!!}
                    <br>
                </div>
                <br>
                <div>
                    <h1>Email Address</h1>
                    {!!$user->email!!}
                    <br>
                </div>
                <br>
                <div>
                    <h1>City</h1>
                    {!!$user->city!!}
                    <br>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection