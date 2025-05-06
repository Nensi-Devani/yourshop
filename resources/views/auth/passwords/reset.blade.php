@extends('layouts.app')
@section('title')
{{ __('Reset Password') }}
@endsection
@section('content')
<div class="mt-md-5">
    <section class="pt-2">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 border shadow p-3" style="border-radius: 20px;width:27rem">
                <h2 class="text-center text-dark-blue">{{ __('Reset Password') }}</h2>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example3">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form3Example4">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter valid password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-outline mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter your password">
                </div>


                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary d-flex mx-auto"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Reset Password') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
</div>
@endsection
