@extends('layouts.app')

@section('content')
    <div class="container box">

        <a href="/" class="btn btn-outline-dark mt-3 mb-3">Back</a>

        <h3 align="center">Send an email to administrator</h3><br />
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form method="post" action="{{url('sendemail/send')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" value="" />
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="email" class="form-control" value="" />
            </div>
            <div class="form-group">
                <label>Type Message Here</label>
                <textarea name="message" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="send" class="btn btn-info" value="Send Message" />
            </div>
        </form>

    </div>
@endsection
