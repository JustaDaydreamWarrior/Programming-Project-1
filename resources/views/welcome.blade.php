
<div class="container">
    @if(isset($details))

        <p> Here are the matches that contain <b> {{ $query }} </b> :</p>

        <h2>User details</h2>
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
                    <td>{{$user->company_name}}</td>
                    <td>{{$user->contact_email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@extends('layouts.app')

