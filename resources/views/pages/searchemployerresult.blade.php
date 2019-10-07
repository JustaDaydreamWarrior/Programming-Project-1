@extends('layouts.app')

@section('content')


<div class="container">
    @if(isset($details))

        <p> Here are the matches that contain <b> {{ $query }} </b> :</p>

        <h2>Employer details</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Company Name</th>
                <th>Contact Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($details as $user)
                <tr>
                    <td><a href="{{ route('employer_profile.show', $user->company_name) }}"> {{ $user->company_name }} </a></td>
                    <td>{{$user->contact_email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p> No matches found! :( sorry!</p>
    @endif



</div>
@endsection

