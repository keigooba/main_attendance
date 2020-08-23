@extends('layouts.template')

@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- タイトル -->
    <div class="col-12 text-center padding">
      <h1 class="font-weight-bold">{{ __('Reset Password') }}</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('password.update') }}" method="post" class="form padding">
      @csrf

      <input type="hidden" name="token" value="{{ $token }}">

      <div class="col-12">

        <label class="text_area">
          <p>{{ __('E-Mail Address') }}</p>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          <p>{{ __('Password') }}</p>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="※8文字以上">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          <p>{{ __('Confirm Password') }}</p>
          <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
        </label>

        <input type="submit" name="submit" class="btn btn-primary" value="{{ __('Send Password Reset Link') }}">
      </div>
    </form>
  </div>
</div>
@endsection
