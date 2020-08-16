<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- タイトル -->
    <div class="col-12 text-center padding">
      @if($target == 'store')
      <h1 class="font-weight-bold">ユーザー登録</h1>
      @elseif($target == 'login')
      <h1 class="font-weight-bold">ログイン</h1>
      @elseif($target == 'update')
      <h1 class="font-weight-bold">ユーザー編集</h1>
      @elseif($target == 'pass_edit')
      <h1 class="font-weight-bold">パスワード変更</h1>
      @endif
    </div>
    <!-- フォーム -->
    @if($target == 'store')
    <form action="/user" method="post" class="form padding">
    @elseif($target == 'login')
    <form action="/login_auth" method="post" class="form padding">
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

        @include('attendance/message')

        <!-- ユーザー登録 -->
        @if($target == 'store')
        <label class="text_area">
          <p>ユーザー名</p>
          <input type="text" name="username" value="{{ $user->username }}" placeholder="漢字入力">
        </label>
        <label class="text_area">
          <p>メールアドレス</p>
          <input type="email" name="email" value="{{ $user->email }}">
        </label>
        <label class="text_area">
          <p>パスワード</p>
          <input type="password" name="password" placeholder="※半角英数字４文字以上">
        </label>
        <label class="text_area">
          <p>パスワード再入力</p>
          <input type="password" name="pass_re">
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
