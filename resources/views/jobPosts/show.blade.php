@extends('layouts.app')

@section('content')
    <div class="container">

            <div class="panel panel-default" align="center">
                <h1>{{$jobPosts->title}}</h1>
                <br>

                <div>
                    <b> Organisation: </b><br> {!!$jobPosts->organisation!!}<br>
                </div>
                <div>
                   <b> Estimated Salary: </b> <br>${!!$jobPosts->estSalary!!}<br>

                </div>
                <div class="col-md-6">
                <b> Description: </b> <br>{!!$jobPosts->description!!}<br><br>
                </div>
                <small>Written on {{$jobPosts->created_at}} by {{$jobPosts->company_name}}</small>
                <br>
                <small>Updated on {{$jobPosts->updated_at}}</small>
                <hr>
                <div class="row">
                    <div class="col">
                        <a href="/jobPosts" class="btn btn-outline-dark mt-3 mb-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
