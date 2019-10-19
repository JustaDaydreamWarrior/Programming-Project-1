@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
             <h1 align="center" class="mt-3 mb-3">Register</h1>
                <div class="card">
                    <div class="card-header">{{ __('Employer Register') }}</div>

                <div class="card-header">
                    <a href="{{ route('register') }}">{{ __('Register as a Job Seeker') }}</a>
                </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employer.register.submit') }}">
                        @csrf

                        <!--Company Name-->
                            <div class="form-group row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="name" autofocus>

                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!--Email-->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- State -->
                            <div class="form-group row{{ $errors->has('state') ? ' has-error' : '' }}">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State/Territory</label>

                                <div class="col-md-6">
                                    <select id="state" name="state" class="form-control" value="{{ old('state') }}"
                                            required>
                                        <option disabled selected value>Select State</option>
                                        <option value="NSW">New South Wales</option>
                                        <option value="ACT">Australian Capital Territory</option>
                                        <option value="VIC">Victoria</option>
                                        <option value="QLD">Queensland</option>
                                        <option value="SA">South Australia</option>
                                        <option value="WA">Western Australia</option>
                                        <option value="NT">Northern Territory</option>
                                        <option value="TAS">Tasmania</option>
                                    </select>

                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- City -->
                            <div class="form-group row{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" pattern="[a-zA-Z ]+"
                                           value="{{ old('city') }}" required>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!--Password-->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!--Email-->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Contact E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="contact_email" type="email" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ old('contact_email') }}" required autocomplete="email">

                                    @error('contact_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!--Phone-->
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="contact_phone" type="text" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone" value="{{ old('contact_phone') }}" required autocomplete="phone">

                                    @error('contact_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!--Submit-->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
