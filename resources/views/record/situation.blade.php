@extends('layouts.template')
@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
<div class="row">
  <div class="col-12 text-center">
    <h1 class="font-weight-bold mb-2">出退勤状況</h1>
    <form action="{{ route('situation') }}" method="post" class="search">
    @csrf
      <label>
        <p style="text-align: initial">日付</p>
        <input type="text" name="date" id="date" value="{{ $date }}">
      </label>
      <input type="submit" class="btn btn-dark ml-4" value="検索">
    </form>
  </div>

  <!-- 出勤状況 -->
  <div class="col-md-6 table_container">
    <div class="text-center">
      <h1 class="font-weight-bold text-primary mb-2">出勤状況</h1>
      <!-- 出勤テーブル -->
      <table border="1" bordercolor="#a8b7c5" class="situation_table">
        <thead class="bg-primary text-white">
          <tr>
            <th class="user">ユーザー名</th>
            <th class="time">時間</th>
            <th class="command"></th>
          </tr>
        </thead>
        <tbody class="js-scroll-bottom">
          @foreach($gorecords as $gorecord)
            <tr>
              <td class="user">{{ $gorecord->user_name }}</td>
              <td class="time">{{ $gorecord['record_time']->format('H:i') }}</td>
              <td class="command">
                  <a class="delete text-danger" href="/gorecord/{{ $gorecord->id }}"
                  onclick="event.preventDefault();
                  document.getElementById('go_destroy').submit();">
                  {{ __('Destory') }}
                </a>
                <form id="go_destroy" action="/gorecord/{{ $gorecord->id }}" method="POST" style="display: none;"><input type="hidden" name="_method" value="DELETE">@csrf</form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- 退勤状況 -->
  <div class="col-md-6 table_container">
    <div class="text-center">
      <h1 class="font-weight-bold text-danger mb-2">退勤状況</h1>
      <!-- 退勤テーブル -->
      <table border="1" bordercolor="#a8b7c5" class="situation_table">
        <thead class="bg-danger text-white">
          <tr>
            <th class="user">ユーザー名</th>
            <th class="time">時間</th>
            <th class="command"></th>
          </tr>
        </thead>
        <tbody class="js-scroll-bottom">
          @foreach($leaverecords as $leaverecord)
            <tr>
              <td class="user">{{ $leaverecord->user_name }}</td>
              <td class="time">{{ $leaverecord['record_time']->format('H:i') }}</td>
              <td class="command">
                  <a class="delete text-danger" href="/leaverecord/{{ $leaverecord->id }}"
                  onclick="event.preventDefault();
                  document.getElementById('leave_destroy').submit();">
                  {{ __('Destory') }}
                </a>
                <form id="leave_destroy" action="/leaverecord/{{ $leaverecord->id }}" method="POST" style="display: none;"><input type="hidden" name="_method" value="DELETE">@csrf</form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<!-- 最新情報自動スクロール -->
<script src="{{ asset('js/scroll.js') }}"></script>
<!-- カレンダー機能 -->
<script src="{{ asset('js/date.js') }}"></script>
@endsection
