<!-- Icons -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon.png') }}">

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
                                <a class="nav-link" href="/support">Support</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/jobPosts">Job Listings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/sendemail">Email</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Login & registeration Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endguest

                        @if(Auth::guard('employer')->check())
                            <li class="nav-item dropdown">
                                <a id="adminDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('employer')->user()->company_name }} (ADMIN) <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
                                    <a href="{{route('employer.home')}}" class="dropdown-item">Dashboard</a>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="admin-logout-form" action="{{ route('employer.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                </ul>
            </div>
        </div>
    </nav>

</div>

