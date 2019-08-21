<!-- Icons -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon.png') }}">

<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-6">
            <h5 class="text-white h4">Collapsed content</h5>
            <span class="text-muted">Toggleable via the navbar brand.</span>
        </div>
    </div>

    <nav class="navbar navbar-dark bg-dark">

        <!-- Product title & Image -->
        <a class="navbar-brand" href="{{ asset('/') }}">
            <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                <img class="icon" src="/icon_inverted.png" style="width: 40px;height: 40px;">
             </span> Handshake</a>

        <form class="form-inline my-2 my-lg-0 ml-auto">
            <button type="button" onclick="location.href='login'" class="btn btn-outline-primary" style="margin:5px;">Login</button>
            <button type="button" onclick="location.href='register'" class="btn btn-outline-primary" style="margin-right:5px; ">Register</button>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- change 'project.team' to your virtualhost name -->
                    <a class="nav-link" href="http://project.team/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://project.team/support">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://project.team/posts">Posts</a>
                </li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li>
                    <a href='http://project.team/posts/create'>Create Post</a>
                </li>
            </ul>
        </div>


    </nav>
</div>

