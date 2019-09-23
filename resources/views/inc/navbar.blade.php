<!-- Icons -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon.png') }}">



<div class="pos-f-t">
    <!-- Check if accessing an employer route -->
    @if (Route::is('employer.*'))
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-6">
                <h5 class="text-white h4">Collapsed content</h5>
                <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
            <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm"> -->
            <div class="container">

                <!-- Product title & Image -->
                <a class="navbar-brand" href="{{ asset('/') }}">
                <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                    <img class="icon" src="/icon_inverted.png" style="width: 40px;height: 40px;">
                 </span> Handshake</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/email">Support</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Login & registration Authentication Links -->

                        <!-- Check if an employer is logged in -->
                        @if(Auth::guard('employer')->check())
                            <li class="nav-item dropdown">
                                <a id="employerDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('employer')->user()->company_name }}<span class="caret"></span>
                                </a>

                                <a class="dropdown-item" href='/edit/user'>
                                    Edit Profile
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="employerDropdown">
                                    <a href="{{route('employer.dashboard')}}" class="dropdown-item">Dashboard</a>
                                    <!-- add more menu items here -->
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#employer-logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="employer-logout-form" action="{{ route('employer.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employer.login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employer.register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    @else
    <!-- Not on an employer page -->
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-6">
                <h5 class="text-white h4">Collapsed content</h5>
                <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">

                <!-- Product title & Image -->
                <a class="navbar-brand" href="{{ asset('/') }}">
                <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                    <img class="icon" src="/icon_inverted.png" style="width: 40px;height: 40px;">
                 </span> Handshake</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/email">Support</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/jobPosts">Job Listings</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Login & registration Authentication Links -->

                        <!-- Check if a Job seeker is logged in -->
                        @if(Auth::guard('web')->check())
                            <ul class="navbar-nav ml-auto">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/matches">Matches</a>
                                    </li>
                                </ul>
                            <li class="nav-item dropdown">
                                <a id="employerDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('web')->user()->name }}<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a href="{{route('dashboard')}}" class="dropdown-item">Dashboard</a>

                                    <a class="dropdown-item" href='/edit/user'>
                                        Edit Profile
                                    </a>
                                    <!-- add more menu items here -->
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#user-logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="user-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @endif
</div>
