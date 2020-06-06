@extends('layouts.app')
@section('title', 'Register - Library App')
@section('content')

<!--MastHead-->
<header class="masthead" id="home">
  <div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">
      <div class="col-md-8 align-self-end">
          <h1 class="text-uppercase text-center font-weight-bold">{{ __('Register') }}</h1>
          <hr class="divider my-3" />
      </div>
      <div class="col-lg-6 align-self-baseline" id="mainform">
        <Form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group row">
            <label for="name"><h5>{{ __('Name') }}</h5></label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group row">
            <label for="birthdate"><h5>{{ __('Birthdate') }}</h5></label>
            <input id="birthdate" type="text" class="form-control datepicker datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker" name="birthdate" required>
          </div>
          <div class="form-group row">
            <label for="email"><h5>{{ __('E-Mail Address') }}</h5></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group row">
            <label for="password"><h5>{{ __('Password') }}</h5></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group row">
            <label for="password-confirm"><h5>{{ __('Confirm Password') }}</h5></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
          <div class="form-group row mb-0">
            <div class="submitForm text-center my-4">
              <button type="submit" class="button text-center">{{ __('Register') }}</button>
            </div>
          </div>
        </Form>
      </div>
    </div>
  </div>
</header>

<!-- Include library Moment JS -->
<script src="{{ asset('libraries/moment/moment.min.js') }}"></script>
<!-- Include library Datepicker Gijgo -->
<script src="{{ asset('libraries/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Include file custom.js -->
<script src="{{ asset('js/custom.js') }}"></script>

<script>
  $(document).ready(function(){
      setDatePicker()
  })
</script>


@endsection
