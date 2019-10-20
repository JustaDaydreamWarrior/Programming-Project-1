<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
        }

        .has-error {
            border-color: #cc0000;
            background-color: #ffff99;
        }
    </style>
    <!-- Scripts from send-email.blade.php ends here-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name','Programming-project-1')}} - @yield('title')</title>


    <!-- Stylesheets -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @include('inc/navbar')
    @include('inc/messages')
</head>
<body>


<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
