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
    <p>③登録するとマイページに移動します。<br>
      右上に自分の名前が確認できましたらログアウトして下さい。<br>
    </p>
    <i class="fas fa-caret-up"></i>
    <p>④トップページに移動しますので<span class="font-weight-bold">ユーザーを選択して下さい</span>の中に自分の名前が追加されているので<br>
    <span class="font-weight-bold">選択し、出勤・退勤ボタンを押すこと</span>で、出退勤が記録されます。</p>
    <p class="mt-4 text-danger"><span class="font-weight-bold">※注意 </span>マイページのユーザー検索・出勤日時・退勤日時の編集及び削除は<br>
    <span class="font-weight-bold">管理者（最初の登録者）</span>しか行えません。<br>
    変更が必要なら<span class="font-weight-bold">管理者に問い合わせて下さい。</span></p>
  </div>
</div>
</div>
@endsection
