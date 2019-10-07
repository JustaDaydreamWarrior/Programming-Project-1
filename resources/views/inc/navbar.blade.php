<!-- Check route being used -->

<!-- Check if accessing an employer route -->
@if (Route::is('employer.*'))

    <!-- Load employer navbar -->
    @component('components.navbar_employer')

    @endcomponent

<!-- Check if accessing an admin route -->
@elseif(Route::is('admin.*'))
    <!-- Load admin navbar -->
    @component('components.navbar_admin')

    @endcomponent

@else
    <!-- Not on an employer page -->
    <!-- Load jobseaker navbar -->
    @component('components.navbar_jobseeker')

    @endcomponent

@endif

