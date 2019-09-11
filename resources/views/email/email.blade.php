@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 align="center" class="mt-3 mb-3">Support</h1>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Having Trouble?</strong></div>
                    <br>
                    <div class="panel-body" align="center">
                        <img src="{{ asset('img/question.png') }}" alt="icon"
                             style="height: 120px; width: 120px; display: block;">
                        <br>
                        <p> Running into issues? Perhaps you simply need some assistance using the website?
                            Our friendly staff at Group54 will happily answer any questions you might have!
                        </p>
                        <p>Feel free to send us any feedback you might have! We are always looking to improve!

                        </p><br>
                    </div>
                </div>
                <div class="col-md-12 col-md-offset-10">
                    <div class="card">
                        <div class="panel-heading"><strong>Send an email to Support</strong></div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{url('email/send')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" value=""/>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" name="email" class="form-control" value=""/>
                            </div>
                            <div class="form-group">
                                <label>Type Message Here</label>
                                <textarea name="message" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="send" class="btn btn-info" value="Send"/>
                            </div>
                        </form>

                    </div>
@endsection
