@extends('layouts.app')
@section('title')
{{ __('Send Password Reset Link') }}
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
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf


                <div class="form-outline my-3">
                    <label class="form-label" for="form3Example3">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email address">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary d-flex mx-auto"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Send Password Reset Link') }}</button>
                  <p class="small fw-bold mt-3 pt-1 mb-0">Go to  <a wire:navigate href="{{url('login')}}"
                      class="link-primary">Login</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
</div>
@endsection
