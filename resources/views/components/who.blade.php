@if(Auth::guard('web')->check())
    <p class="text-success">
        You are logged in as a <strong>USER</strong>
    </p>
@else
    <p class="text-danger">
        You are logged out as a <strong>USER</strong>
    </p>
@endif

@if(Auth::guard('employer')->check())
    <p class="text-success">
        You are logged in as a <strong>EMPLOYER</strong>
    </p>
@else
    <p class="text-danger">
        You are logged out as a <strong>EMPLOYER</strong>
    </p>
@endif
