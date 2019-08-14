@extends('layouts.app')

@section('title')
{{$title}}
@endsection

@section('content')
        <h1>this is services page</h1>
        @if(count($services) > 0)
            <ul class="list-group">
                @foreach($services as $service)
                    <li class="list-group-item">{{$service}}</li>
                @endforeach
            </ul>
        @endif

@endsection

