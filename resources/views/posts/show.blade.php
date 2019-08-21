@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-dark mt-3 mb-3">Back</a>
    <h1>{{$post->title}}</h1>
    <br>
    <div>
        {!!$post->body!!}
    </div>
    <small>Written on {{$post->created_at}}</small>
    <br>
    <small>Updated on {{$post->updated_at}}</small>
    <hr>
    <div class="row">
        <div class="col">
            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark mt-3 mb-3">Edit</a>
        </div>
        <div class="col mt-3 mb-3">
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}  
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
            {!!Form::close()!!}
        </div>
    </div>

@endsection

