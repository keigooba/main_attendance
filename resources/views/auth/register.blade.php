@extends('layouts.template')

@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- タイトル -->
    <div class="col-12 text-center padding">
      <h1 class="font-weight-bold">{{ __('Register') }}</h1>
    </div>

    <!-- フォーム -->
    <form action="{{ route('register') }}" method="post" class="form padding">
      @csrf

      <div class="col-12">

        <label class="text_area">
          <p>{{ __('Name') }}</p>
          <input type="text" name="name" class="form-control   @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="漢字入力" required autocomplete="name" autofocus>

          @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </label>

        <label class="text_area">
          <p>{{ __('E-Mail Address') }}</p>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          <p>{{ __('Password') }}</p>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="※半角英数字４文字以上" required autocomplete="new-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          <p>{{ __('Confirm Password') }}</p>
          <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </label>

        <input type="submit" name="submit" class="btn btn-warning" value="登録">

      </div>
    </form>
  </div>
</div>
@endsection
