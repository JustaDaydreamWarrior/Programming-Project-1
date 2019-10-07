@extends('layouts.app')

@section('content')


    <div class="container">
        @if(isset($details))

            <p> Here are the matches that contain <b> {{ $query }} </b> :</p>

            <h2>Job details</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Organisation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $user)
                    <tr>
                        <td>{{$user->title}}</td>
                        <td>{{$user->organisation}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p> No matches found! :( sorry!</p>
        @endif



    </div>
@endsection

