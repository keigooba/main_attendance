@extends('layouts.template')
@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- タイトル -->
    <div class="col-12 text-center padding">
      <h1 class="font-weight-bold">ユーザー編集</h1>
    </div>
    <!-- フォーム -->
    <form action="/user/{{ Auth::user()->id }}" method="post" class="form padding">
      <!-- updateメソッドにはPUTメソッドがルーティングされているのでPUTにする -->
      <input type="hidden" name="_method" value="PUT">
      @csrf
      <div class="col-12">
        <!-- ユーザー編集 -->
        <label class="text_area">
          <p>{{ __('Name') }}</p>
          <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

          @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </label>

        <label class="text_area">
          <p>{{ __('E-Mail Address') }}</p>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" required autocomplete="email">

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          <p>古い{{ __('Password') }}</p>
          <input type="password" name="password_old" class="form-control @error('password') is-invalid @enderror" placeholder="※４文字以上" required autocomplete="new-password">
          @error('password_old')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          <p>新しい{{ __('Password') }}</p>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="※４文字以上" required autocomplete="new-password">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <label class="text_area">
          <p>新しい{{ __('Confirm Password') }}</p>
          <input type="password" name="password_confirmation" class="form-control"  required">
        </label>

        <input type="submit" name="submit" class="btn btn-warning" value="変更">
      </div>
    </form>
  </div>
</div>
@endsection
