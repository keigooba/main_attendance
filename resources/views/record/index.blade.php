@extends('layouts.template')

@section('content')
<!-- メインメニュー -->
<h1 id="js-show-msg" class="msg-slide text-center font-weight-bold" style="display: none;">
{{ $message[0] }}
</h1>
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
        <button type="button" class="btn btn-light btn-outline-dark font-medium"><a href="{{ route('situation') }}">出退勤状況</a></button>
      </div>

      <!-- ユーザー選択 -->
      <div class="col-md-8 user_btn">
        <p class="lead mb-3">ユーザーを選択して下さい</p>
        @foreach($users as $user)
        <label class="btn btn-warning font-medium mb-2">
          <input type="radio" name="name" value="{{ $user->name }}">{{ $user->name }}
        </label>
        @endforeach
      </div>

      <!-- 出退勤ログ -->
      <div class="col-md-4">
        <div class="border border-secondary bg-light log_container js-scroll-bottom mb-2">
          @foreach($gorecords as $gorecord)
            <p>{{$gorecord['record_date']->format('m/d')}}  {{$gorecord['record_time']->format('H:i')}}<span class="{{$gorecord->go_class}}">{{$gorecord->go_flg}}</span> {{$gorecord->user_name}}</p>
          @endforeach
        </div>
        <div class="border border-secondary bg-light log_container js-scroll-bottom">
        @foreach($leaverecords as $leaverecord)
          <p>{{$leaverecord['record_date']->format('m/d')}} {{$leaverecord['record_time']->format('H:i')}}<span class="{{$leaverecord->leave_class}}">{{$leaverecord->leave_flg}}</span> {{$leaverecord->user_name}}</p>
        @endforeach
        </div>
      </div>
    </div>
  </form>
</div>
<!-- メッセージ表示 -->
<script src="{{ asset('js/message.js') }}"></script>
<!-- 最新情報自動スクロール -->
<script src="{{ asset('js/scroll.js') }}"></script>
@endsection
