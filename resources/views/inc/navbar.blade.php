<!-- Icons -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon.png') }}">

<div class="pos-f-t">
    <!-- Check route being used -->

    @if (Route::is('employer.*'))
        <!-- Load employer navbar -->
        @component('components.navbar_employer')

        @endcomponent
    @else
        <!-- Not on an employer page -->
        <!-- Load jobseaker navbar -->
        @component('components.navbar_jobseeker')

        @endcomponent

    @endif
</div>

