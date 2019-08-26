@extends('layouts.app')

@section('content')
    <h1 align="center" class="mt-3 mb-3">Create a Job Listing</h1>

    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <div class="panel-heading"><strong>Enter Listing Details</strong></div>

                {!! Form::open(['action' => 'JobPostsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{form::label('job position', 'Job Title')}}
                    {{form::text('title', '', ['class' => 'form-control', 'placeholder' => 'title'])}}
                </div>

                <div class="form-group">
                    {{form::label('organisation', 'Organisation')}}
                    {{form::text('organisation', '', ['class' => 'form-control', 'placeholder' => 'organisation'])}}
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            {{form::label('estSalary', 'Salary estimate')}}
                            {{form::text('estSalary', '', ['class' => 'form-control', 'placeholder' => 'salary'])}}
                        </div>


                        <div class="col">
                            {{form::label('email', 'E-mail')}}
                            {{form::text('email', '', ['class' => 'form-control', 'placeholder' => 'email'])}}
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    {{form::label('job description', 'Job description')}}
                    {{form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'description'])}}
                </div>
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>

@endsection

