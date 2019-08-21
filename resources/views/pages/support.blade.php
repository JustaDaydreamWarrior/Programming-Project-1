@extends('layouts.app')

@section('title')
	{{$title}}
@endsection

@section('content')
        <h1 class="mt-3 mb-3">Support</h1>
        @if(count($services) > 0)
            <ul class="list-group">
                @foreach($services as $service)
                    <li class="list-group-item">{{$service}}</li>
                @endforeach
            </ul>
        @endif

@endsection

