@extends('layouts.template')

@section('content')
<!-- メインメニュー -->
<h2 id="js-show-msg" class="msg-slide text-center" style="display: none;">
{{ $record[0] }}
</h2>
<div class="container-fluid padding" id="main">
<form action="/record" method="post">
  @csrf
  <div class="row">
    <!-- 出退勤ボタン -->
    <div class="col-12 mb-4 attendance_btn">
      <button type="submit" name="go" class="btn btn-primary font-large" value="Go"><i class="fas fa-sign-in-alt" style="transform:rotateZ(-90deg)"></i>出勤</button>

      <button type="submit" name="leave" class="btn btn-danger font-large" value="Leave" style="float:right"><i class="fas fa-sign-in-alt" style="transform:rotateZ(90deg);"></i>退勤</button>

    </div>

    <div class="col-12 mb-4 situation_btn">
      <button type="button" class="btn btn-light font-medium"><a href="/situation">出退勤状況</a></button>
    </div>

    <!-- ユーザー選択 -->
    <div class="col-md-8 user_btn js-scroll-bottom">
      <p class="lead mb-2">ユーザーを選択して下さい</p>
      @foreach($users as $user)
      <label class="btn btn-warning font-small mb-2">
        <input type="radio" name="id" value="{{ $user->id }}" style="display:none;">{{ $user->name }}
      </label>
      @endforeach
    </div>

    <!-- 出退勤ログ -->
    <div class="col-md-4">
      <div class="border border-secondary bg-light log_container js-scroll-bottom">
      </div>
    </div>

  </div>
</form>
</div>
@endsection
