@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div>
                    <div id="adminUsername">
                        Welcome back, {{ Auth::guard('admin')->user()->name}}
                    </div>
                    <div id="adminRole">
                        isSuperAdmin:
                        @php
                            $isSuper = Auth::guard('admin')->user()->isSuperAdmin;
                            echo true === (bool)$isSuper ? 'True' : 'False';
                        @endphp
                    </div>
                </div>
                <hr>
                <div id="components">
                    @component('components.who')
                    @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection
