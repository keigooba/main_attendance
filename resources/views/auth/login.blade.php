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
    <form action="{{ route('login') }}" method="POST" class="form padding">
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
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="※4文字以上" required autocomplete="current-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          @if (Route::has('password.request'))
            <a class="font-weight-bold text-primary" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
          @endif
        </label>


        <input type="submit" name="submit" class="btn btn-warning" value="簡易{{ __('Login') }}" style="float:left;">
        <input type="submit" name="submit" class="btn btn-dark" value="{{ __('Login') }}" style="border-radius:initial">

      </div>
    </form>
  </div>
</div>
@endsection
