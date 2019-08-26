@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <div class="panel-heading"><strong>Edit Listing Details</strong></div>


                {!! Form::open(['action' => ['JobPostsController@update', $jobPosts->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{form::label('title', 'Title')}}
                    {{form::text('title', $jobPosts->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>

                <div class="row">
                    <div class="col">
                        {{form::label('organisation', 'organisation')}}
                        {{form::text('organisation', $jobPosts->f_name, ['class' => 'form-control', 'placeholder' => 'organisation'])}}
                    </div>


                    <div class="col">
                        {{form::label('estSalary', 'Lastname')}}
                        {{form::text('estSalary', $jobPosts->l_name, ['class' => 'form-control', 'placeholder' => 'Lastname'])}}
                    </div>


                    <div class="col">
                        {{form::label('email', 'email')}}
                        {{form::text('email', $jobPosts->phone_number, ['class' => 'form-control', 'placeholder' => 'email'])}}
                    </div>
                </div>
                <br>
                <div class="form-group">
                    {{form::label('description', 'description')}}
                    {{form::textarea('description', $jobPosts->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'description'])}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                <a href="/jobPosts" class="btn btn-outline-dark mt-3 mb-3">Back</a>
                {{Form::submit('Submit', ['class'=>'btn btn-outline-dark mt-3 mb-3'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection

