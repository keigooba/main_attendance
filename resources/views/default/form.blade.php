@extends('layouts.template')

@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- タイトル -->
    <div class="col-12 text-center padding">
      @if($target == 'store')
      <h1 class="font-weight-bold">{{ __('Register') }}</h1>
      @elseif($target == 'login')
      <h1 class="font-weight-bold">{{ __('Login') }}</h1>
      @elseif($target == 'update')
      <h1 class="font-weight-bold">ユーザー編集</h1>
      @elseif($target == 'pass_edit')
      <h1 class="font-weight-bold">パスワード変更</h1>
      @endif
    </div>
    <!-- フォーム -->
    @if($target == 'store')
    <form action="{{ route('register') }}" method="post" class="form padding">
      @csrf

    @elseif($target == 'login')
    <form action="{{ route('login') }}" method="post" class="form padding">

    @elseif($target == 'update')
    <form action="/user/{{ $user->id }}" method="post" class="form padding">
      <!-- updateメソッドにはPUTメソッドがルーティングされているのでPUTにする -->
      <input type="hidden" name="_method" value="PUT">

    @elseif($target == 'pass_edit')
    <form action="/pass_update" method="post" class="form padding">
      <!-- updateメソッドにはPUTメソッドがルーティングされているのでPUTにする -->
      <!-- <input type="hidden" name="_method" value="PUT"> -->
    @endif

      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="col-12">

        <!-- ユーザー登録 -->
        @if($target == 'store')
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
          <p>{{ __('Confirm Password') }</p>
          <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </label>

        <input type="submit" name="submit" class="btn btn-warning" value="登録">

        <!-- ログイン -->
        @elseif($target == 'login')
        <label class="text_area">
          <p>メールアドレス</p>
          <input type="email" name="email">
        </label>
        <label class="text_area">
          <p>パスワード</p>
          <input type="password" name="password" placeholder="※半角英数字４文字以上">
        </label>
        <input type="submit" name="submit" class="btn btn-warning" value="簡易ログイン" style="float:left;">
        <input type="submit" name="submit" class="btn btn-dark" value="ログイン" style="border-radius:initial">

        <!-- ユーザー編集 -->
        @elseif($target == 'update')
        <label class="text_area">
          <p>ユーザー名</p>
          <input type="text" name="username" value="{{ $user->username }}" placeholder="漢字入力">
        </label>
        <label class="text_area">
          <p>メールアドレス</p>
          <input type="email" name="email" value="{{ $user->email }}">
        </label>
        <input type="submit" name="submit" class="btn btn-warning" value="変更">

        <!-- パスワード変更 -->
        @elseif($target == 'pass_edit')
        <label class="text_area">
          <p>現在のパスワード</p>
          <input type="password" name="password_old" placeholder="半角英数４文字以上">
        </label>
        <label class="text_area">
          <p>新しいパスワード</p>
          <input type="password" name="password" placeholder="半角英数４文字以上">
        </label>
        <label class="text_area">
          <p>新しいパスワード（再入力）</p>
          <input type="password" name="pass_re">
        </label>
        <input type="submit" name="submit" class="btn btn-warning" value="変更">
        @endif
      </div>
    </form>
  </div>
</div>
@endsection
