@extends('layouts.template')
@section('content')
<!-- メインメニュー -->
<h1 id="js-show-msg" class="msg-slide text-center font-weight-bold" style="display: none;">
{{ $message[0] }}
</h1>
<div class="container-fluid padding" id="main">
<div class="row">
  <div class="col-12 text-center mb-2">
    <h1 class="font-weight-bold mb-2">マイページ</h1>
    <form action="/user/record" method="post" class="search">
      @csrf
      <label style="width:240px;">
        <p style="text-align: initial">ユーザー名</p>
        <select name="id" class="select_box mr-4 font-small">
          @foreach($users as $user)
          <option name="id" value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
        </select>
      </label>
      <input type="submit" class="btn btn-dark ml-4" value="検索">
    </form>
  </div>
  <!-- 出勤日時 -->
  <div class="col-md-6 datetime_container">
    <div class="text-center">
      <h1 class="font-weight-bold text-primary mb-2">出勤日時</h1>
      <table border="1" bordercolor="#a8b7c5" class="mypage_table">
        <thead class="bg-primary text-white">
          <tr>
            <th class="date">日付</th>
            <th class="time">時間</th>
            <th class="command"></th>
            <th class="command"></th>
          </tr>
        </thead>
        <tbody class="js-scroll-bottom">
          @foreach($gorecords as $gorecord)
          <tr>
            <td class="date">{{ $gorecord['record_date']->format('m/d')}}</td>
            <td class="time">{{ $gorecord['record_time']->format('H:i') }}</td>
            <td class="command"><a href="user/gorecord/{{ $gorecord->id }}/edit" class="edit text-primary">編集</a></td>
            <td class="command">
            <a class="delete text-danger" href="/gorecord/{{ $gorecord->id }}"
                  onclick="event.preventDefault();
                  document.getElementById('go_destroy').submit();">
                  {{ __('Destory') }}
                </a>
                <form id="go_destroy" action="/gorecord/{{ $gorecord->id }}" method="POST" style="display: none;">
                  <input type="hidden" name="_method" value="DELETE">
                  @csrf
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- 退勤日時 -->
  <div class="col-md-6 table_container">
    <div class="text-center">
      <h1 class="font-weight-bold text-danger mb-2">退勤日時</h1>
      <table border="1" bordercolor="#a8b7c5" class="mypage_table">
        <thead class="bg-danger text-white">
          <tr>
            <th class="date">日付</th>
            <th class="time">時間</th>
            <th class="command"></th>
            <th class="command"></th>
          </tr>
        </thead>
        <tbody class="js-scroll-bottom">
          @foreach($leaverecords as $leaverecord )
          <tr>
            <td class="date">{{ $leaverecord['record_date']->format('m/d') }}</td>
            <td class="time">{{ $leaverecord['record_time']->format('H:i') }}</td>
            <td class="command"><a href="user/leaverecord/{{ $leaverecord->id }}/edit" class="edit text-primary">編集</a></td>
            <td class="command">
              <a class="delete text-danger" href="/leaverecord/{{ $leaverecord->id }}"
                onclick="event.preventDefault();
                document.getElementById('leave_destroy').submit();">
                {{ __('Destory') }}
              </a>
              <form id="leave_destroy" action="/leaverecord/{{ $leaverecord->id }}" method="POST" style="display: none;">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<!-- メッセージ表示 -->
<script src="{{ asset('js/message.js') }}"></script>
<!-- 最新情報自動スクロール -->
<script src="{{ asset('js/scroll.js') }}"></script>
@endsection
