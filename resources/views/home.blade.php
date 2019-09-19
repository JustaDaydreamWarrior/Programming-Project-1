@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Created Public Profiles</div>

                <div class="card-body">
                    @foreach($users as $user)
                        {{ $user->id }}
                        <a href="{{route('profile.show', $user->name) }}">{{ $user->name }}</a>
                        <br>
                    @endforeach

                    <?php echo $users->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



