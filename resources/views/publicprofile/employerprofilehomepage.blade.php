@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Created Public Profiles</div>
                <div class="card-body">
                    @foreach($employers as $user)
                        {{ $user->id }}
                        <a href="{{ route('employer_profile.show', $user->company_name) }}"> {{ $user->company_name }} </a>
                        <br>


                        @endforeach
                    <br>

                    <?php echo $employers->render(); ?>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection



