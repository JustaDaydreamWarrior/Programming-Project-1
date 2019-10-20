@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Created Job Seeker Profiles</div>
                    <div class="card-body">
                        @foreach($users as $user)
                            {{ $user->id }}
                            <a href="{{ route('jobseeker_profile.show', $user->name) }}"> {{ $user->name }} </a>
                            <br>


                        @endforeach
                        <br>

                        <?php echo $users->render(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



