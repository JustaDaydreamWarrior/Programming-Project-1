<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon_dark.png') }}">

<div class="pos-f-t">

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
                        <img class="icon" src="/icon_light.png" style="width: 40px;height: 40px;">
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
                                <a id="about" class="nav-link" href="{{ route('about') }}">About</a>
                            </li>

                            <li class="nav-item">
                                <a id="support" class="nav-link" href="{{ route('support') }}">Support</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('jobseeker_profile') }}">Job Seeker Profiles</a>
                            </li>

                            <li class="nav-item">
                                <a id="list_job" class="nav-link" href="{{ route('jobPosts-create') }}">Job Listings</a>
                            </li>
                            <li class="nav-item">
                                <a id="employers" class="nav-link" href="{{ route('employer.home') }}">Employer Site</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Login & registration Authentication Links -->

                    <!-- Check if a Job seeker is logged in -->
                    @if(Auth::guard('web')->check())
                        <li class="nav-item">
                            <a id="matches" class="nav-link" href="{{ route('matches') }}">Matches</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="userDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('web')->user()->name }}<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a href="{{route('dashboard')}}" class="dropdown-item">Dashboard</a>
                                <!-- add menu items below this line -->
                                <a id="edit_profile" class="dropdown-item" href='{{ route('user.edit') }}'>
                                    Edit Profile
                                </a>

                                <a id="logout" class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#user-logout-form').submit();">
                                    Logout
                                </a>
                                <form id="user-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a id="login_user" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a id="register_user" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
