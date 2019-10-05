@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-10">
            <div class="panel panel-default" align="center">
                <h1>My Job Seeker Profile Page</h1>
                <br>
                <br>
                <h1>Name</h1>
                <p>{{$user->name}}</p>
                <br>
                <div>
                    <h1>User ID</h1>
                    {!!$user->id!!}
                    <br>
                </div>
                <br>
                <div>
                    <h1>Email Address</h1>
                    {!!$user->email!!}
                    <br>
                </div>
                <br>
                <div>
                    <h1>State</h1>
                    {!!$user->state!!}
                    <br>
                </div>
                <br>
                <div>
                    <h1>City</h1>
                    {!!$user->city!!}
                    <br>
                </div>
                <br>
                <div>
                    <h1>Years Of Experience</h1>
                    {!!$user->experience!!}
                    <br>
                </div>
                <br>
                <h1>Skills</h1>
                <br>
                <h1>Programming and Scripting Languages</h1>

                <div class="checkbox-container">
                    <div class="{{ $errors->has('bash') ? ' has-error' : '' }}">
                        <label for="bash" class="">Bash</label>
                        <br>
                        {!!$user->bash!!}

                        <div class="{{ $errors->has('html') ? ' has-error' : '' }}">
                            <label for="bash" class="">HTML</label>
                            <br>
                            {!!$user->html!!}
                            <div class="{{ $errors->has('python') ? ' has-error' : '' }}">
                                <label for="python" class="">Python</label>
                                <br>
                                {!!$user->python!!}
                                <div class="{{ $errors->has('c') ? ' has-error' : '' }}">
                                    <label for="c" class="">C</label>
                                    <br>
                                    {!!$user->c!!}
                                    <div class="{{ $errors->has('java') ? ' has-error' : '' }}">
                                        <label for="java" class="">Java</label>
                                        <br>
                                        {!!$user->java!!}
                                        <div class="{{ $errors->has('ruby') ? ' has-error' : '' }}">
                                            <label for="ruby" class="">Ruby</label>
                                            <br>
                                            {!!$user->ruby!!}
                                            <div class="{{ $errors->has('c#') ? ' has-error' : '' }}">
                                                <label for="c#" class="">c#</label>
                                                <br>
                                                {!!$user->c#!!}
                                                <div class="{{ $errors->has('javascript') ? ' has-error' : '' }}">
                                                    <label for="javascript" class="">Javascript</label>
                                                    <br>
                                                    {!!$user->javascript!!}
                                                    <div class="{{ $errors->has('rust') ? ' has-error' : '' }}">
                                                        <label for="rust" class="">Rust</label>
                                                        <br>
                                                        {!!$user->rust!!}
                                                        <div class="{{ $errors->has('c++') ? ' has-error' : '' }}">
                                                            <label for="c++" class="">C++</label>
                                                            <br>
                                                            {!!$user->c++!!}
                                                            <div class="{{ $errors->has('powershell') ? ' has-error' : '' }}">
                                                                <label for="powershell" class="">Powershell</label>
                                                                <br>
                                                                {!!$user->powershell!!}
                                                                <div class="{{ $errors->has('sql') ? ' has-error' : '' }}">
                                                                    <label for="sql" class="">SQL</label>
                                                                    <br>
                                                                    {!!$user->sql!!}
                                                                    <div class="{{ $errors->has('css') ? ' has-error' : '' }}">
                                                                        <label for="css" class="">CSS</label>
                                                                        <br>
                                                                        {!!$user->css!!}
                                                                        <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                                                                            <label for="php" class="">PHP</label>
                                                                            <br>
                                                                            {!!$user->php!!}
                                                                            <br>

                    </div>


    </div>




@endsection
