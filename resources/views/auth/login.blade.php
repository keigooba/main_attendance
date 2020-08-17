@extends('layouts.template')

@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- タイトル -->
    <div class="col-12 text-center padding">
      <h1 class="font-weight-bold">{{ __('Login') }}</h1>
    </div>
    <!-- フォーム -->
    <form action="{{ route('login') }}" method="post" class="form padding">
        @csrf

      <div class="col-12">

        <label class="text_area">
          <p>{{ __('E-Mail Address') }}</p>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          <p>{{ __('Password') }}</p>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="※半角英数字４文字以上" required autocomplete="current-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

          <label class="form-check-label" for="remember">
              {{ __('Remember Me') }}
          </label>
        </div>

        <input type="submit" name="submit" class="btn btn-warning" value="簡易{{ __('Login') }}" style="float:left;">
        <input type="submit" name="submit" class="btn btn-dark" value="{{ __('Login') }}" style="border-radius:initial">

        @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
        @endif
      </div>
    </form>
  </div>
</div>
@endsection
