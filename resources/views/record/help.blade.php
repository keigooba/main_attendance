@extends('layouts.template')
@section('content')
    <!-- メインメニュー -->
    <div class="container-fluid padding" id="main">
    <div class="row">
      <!-- 使い方 -->
      <div class="col-12 text-center padding">
        <h1 class="font-weight-bold">使い方</h1>
      </div>
      <div class="col-12 text-center">
        <p class="mb-4">Attendanceとは出退勤という意味があり、そこから名付けました。<br>こちらでAttendanceの使い方を説明します。</p>
        <p>①<span class="font-weight-bold">最上部のユーザー登録</span>を押します。</p>
        <i class="fas fa-caret-up"></i>
        <p>②ユーザー名、メールアドレス、パスワード、パスワード再入力<br>を入力して<span class="font-weight-bold">登録</span>を押します。</p>
        <i class="fas fa-caret-up"></i>
        <p>③登録するとTopページに戻ります。<br>
          ユーザー名が追加されていたら登録完了です。<br>
          <span class="font-weight-bold">出勤・退勤ボタン</span>を押すと出退勤が記録されます。
        </p>
        <i class="fas fa-caret-up"></i>
        <p>④<span class="font-weight-bold">最上部のログイン</span>を押し、ログインすると<br>
          マイページでパスワードの変更、出退勤の確認or削除・編集（管理者のみ）等が可能です。</p>
      </div>
    </div>
    </div>
@endsection
