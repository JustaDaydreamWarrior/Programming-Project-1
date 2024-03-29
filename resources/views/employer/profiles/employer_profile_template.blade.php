@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <h1>My Employer Profile Page</h1>
                <br>
                <br>
                <h1>Organisation</h1>
                <p>{{$user->company_name}}</p>
                <br>
                <div>
                    <h1>Contact Email Address</h1>
                    {!!$user->contact_email!!}
                    <br>
                </div>
                <br>
                <div>
                    <h1>Phone Number</h1>
                    {!!$user->contact_phone!!}
                    <br>
                </div>
                <br>
            </div>
        </div>
    </div>
    </div>

@endsection
