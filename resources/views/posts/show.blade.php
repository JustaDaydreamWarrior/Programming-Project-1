@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <div class="panel-heading"><strong>Viewing ticket: {{$post->title}}</strong></div>
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

                    <a href="/posts" class="btn btn-outline-dark mt-3 mb-3">Back</a>
                    <div class="col mt-3 mb-3">
                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger '])}}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

