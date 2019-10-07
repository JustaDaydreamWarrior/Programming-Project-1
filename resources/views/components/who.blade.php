@if(Auth::guard('web')->check())
    <p id="user" class="text-success">
        You are logged in as a <strong>USER</strong>
    </p>
@else
    <p id="user" class="text-danger">
        You are logged out as a <strong>USER</strong>
    </p>
@endif

@if(Auth::guard('employer')->check())
    <p id="employer" class="text-success">
        You are logged in as an <strong>EMPLOYER</strong>
    </p>
@else
    <p id="employer" class="text-danger">
        You are logged out as an <strong>EMPLOYER</strong>
    </p>
@endif

@if(Auth::guard('admin')->check())
    <div id="admin_div" class="text-success">
        You are logged in as an <strong>ADMIN</strong>
        <div id="adminUsername">
            Welcome back, {{ Auth::guard('admin')->user()->username}}
        </div>
        <div id="adminRole">
            isSuperAdmin:
            @php
                $isSuper = Auth::guard('admin')->user()->isSuperAdmin;
                echo true === (bool)$isSuper ? 'True' : 'False';
            @endphp
        </div>
    </div>
@else
    <p id="admin" class="text-danger">
        You are logged out as an <strong>ADMIN</strong>
    </p>
@endif
