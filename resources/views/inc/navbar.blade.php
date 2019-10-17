<!-- Check route being used -->

<!-- Check if accessing an employer route -->
@if (Route::is('employer.*'))
{{-- @if(Auth::guard('employer')->check()) --}}
    <!-- Load employer navbar -->
    @component('components.navbar_employer')

    @endcomponent

<!-- Check if accessing an admin route -->
@elseif(Route::is('admin.*'))
{{-- @elseif(Auth::guard('admin')->check()) --}}
    <!-- Load admin navbar -->
    @component('components.navbar_admin')

    @endcomponent

@else
    <!-- Not on an employer page -->
    <!-- Load jobseaker navbar -->
    @component('components.navbar_jobseeker')

    @endcomponent

@endif