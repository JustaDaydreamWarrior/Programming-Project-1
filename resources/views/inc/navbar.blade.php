<!-- Check route being used -->

<!-- Check if accessing an employer route -->
@if (Route::is('employer.*'))

    <!-- Load employer navbar -->
    @component('components.navbar_employer')

    @endcomponent

    <!-- Not on an employer page -->
@else

    <!-- Load jobseaker navbar -->
    @component('components.navbar_jobseeker')

    @endcomponent

@endif

