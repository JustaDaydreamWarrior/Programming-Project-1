
<div class="container">
    @if(isset($details))

        <p> Here are the matches that contain <b> {{ $query }} </b> :</p>


        <h2>User details</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($details as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@extends('layouts.app')
