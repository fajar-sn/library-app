@extends('layouts.app')
@section('title', 'Login - Library App')
@section('content')
<!--MastHead-->
<header class="masthead" id="home">
  <div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">
      <div class="col-lg-10 align-self-end">
        <h1 class="text-uppercase text-center font-weight-bold">{{ __('Login') }}</h1>
        <hr class="divider my-3" />
      </div>
      <div class="col-lg-6 align-self-baseline" id="mainform">
        <Form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group row">
            <label for="email"><h5>{{ __('E-Mail Address') }}</h5></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group row">
            <label for="password"><h5>{{ __('Password') }}</h5></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          
          <div class="submitForm my-4">
            <div class="form-group row justify-content-center">
                <button type="submit" class="button text-center">
                    {{ __('Login') }}
                </button>

                {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif --}}
              
            </div>
            <div class="form-group row mb-0 justify-content-center">
              <h6 class="my-3">Not a member? <a href="{{ route('register') }}">{{ __('Register') }}</a></h6>
            </div>
          </div>
        </Form>
      </div>
    </div>
  </div>
</header>

@endsection
