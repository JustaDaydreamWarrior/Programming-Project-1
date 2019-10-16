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
                    <h1>Education</h1>
                    {!!$user->education!!}
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
                <h5 align="center">Programming and Scripting Languages</h5>

                <div class="checkbox-container">
                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="bash" class="">Bash</label>
                        <br>
                        {!!$user->bash!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="html" class="">HTML</label>
                        <br>
                        {!!$user->html!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="python" class="">Python</label>
                        <br>
                        {!!$user->python!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="c" class="">C</label>
                        <br>
                        {!!$user->c!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="java" class="">Java</label>
                        <br>
                        {!!$user->java!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="ruby" class="">Ruby</label>
                        <br>
                        {!!$user->ruby!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="csharp" class="">C#</label>
                        <br>
                        {!!$user->csharp!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="javascript" class="">Javascript</label>
                        <br>
                        {!!$user->javascript!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="rust" class="">Rust</label>
                        <br>
                        {!!$user->rust!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="cplus" class="">C++</label>
                        <br>
                        {!!$user->cplus!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="powershell" class="">Powershell</label>
                        <br>
                        {!!$user->powershell!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="sql" class="">SQL</label>
                        <br>
                        {!!$user->sql!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="css" class="">CSS</label>
                        <br>
                        {!!$user->css!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="php" class="">PHP</label>
                        <br>
                        {!!$user->php!!}
                        <br>
                    </div>
                        </div>

                <hr>
                <h5 align="center">Operating Systems</h5>

                <div class="checkbox-container">
                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="linux" class="">Linux</label>
                        <br>
                        {!!$user->linux!!}
                        <br>
                    </div>


                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="windows7" class="">Windows 7</label>
                        <br>
                        {!!$user->windows7!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="iOS" class="">iOS</label>
                        <br>
                        {!!$user->iOS!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="macOS" class="">MacOS</label>
                        <br>
                        {!!$user->macOS!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="unix" class="">Unix</label>
                        <br>
                        {!!$user->unix!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="windowsOld" class="">Legacy Windows</label>
                        <br>
                        {!!$user->windowsOld!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="android" class="">Android</label>
                        <br>
                        {!!$user->android!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="windowsServer" class="">Windows Server</label>
                        <br>
                        {!!$user->windowsServer!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="windows10" class="">Windows 10</label>
                        <br>
                        {!!$user->windows10!!}
                        <br>
                    </div>
                </div>
                <hr>

                <h5 align="center">Software</h5>

                <div class="checkbox-container">

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="microsoftOffice" class="">Microsoft Office</label>
                        <br>
                        {!!$user->microsoftOffice!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="adobe" class="">Creative Cloud</label>
                        <br>
                        {!!$user->adobe!!}
                        <br>
                    </div>



                </div>

                <hr>
                <h5 align="center">Other Skills</h5>

                <div class="checkbox-container">
                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="ciscoSystems" class="">Cisco Networking</label>
                        <br>
                        {!!$user->ciscoSystems!!}
                        <br>
                    </div>

                    <div class="{{ $errors->has('') ? ' has-error' : '' }}">
                        <label for="cloud" class="">Cloud Computing</label>
                        <br>
                        {!!$user->cloud!!}
                        <br>
                    </div>


                </div>









            </div>
                </div>






    </div>




@endsection
