@extends('layouts.app')

@section('content')
    <h1 class="mt-3 mb-3">Create Post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{form::label('title', 'Title')}}
            {{form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        
        <div class="row">
                <div class="col">
                {{form::label('f_name', 'Firstname')}}
                {{form::text('f_name', '', ['class' => 'form-control', 'placeholder' => 'Firstname'])}}
                </div>
        
        
                <div class="col">
                {{form::label('l_name', 'Lastname')}}
                {{form::text('l_name', '', ['class' => 'form-control', 'placeholder' => 'Lastname'])}}
                </div>
        
        
                <div class="col">
                {{form::label('phone_number', 'Phone number')}}
                {{form::text('phone_number', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
                </div>
        </div>
        <br>
        <div class="form-group">
                {{form::label('body', 'Body')}}
                {{form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    
@endsection

