@extends('layouts.template')
@section('content')
<!-- メインメニュー -->
<h1 id="js-show-msg" class="msg-slide text-center font-weight-bold" style="display: none;">
{{ $record[0] }}
</h1>
<div class="container-fluid padding" id="main">
<div class="row">
  <div class="col-12 text-center">
    <h1 class="font-weight-bold">マイページ</h1>
  </div>
  <!-- 出勤日時 -->
  <div class="col-md-6 datetime_container">
    <div class="text-center">
      <h1 class="font-weight-bold text-primary mb-2">出勤日時</h1>
      <form action="/user/search" method="post" class="search">
        <p class="select_text">ユーザー名</p>
        <select name="u_id" class="select_box mr-4">
          @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
        </select>
        <input type="submit" name="submit" class="btn btn-dark" value="検索">
      </form>
      <table border="1" bordercolor="#a8b7c5" class="mypage_table font-medium">
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
            <td class="date">{{ $gorecord->go_date }}</td>
            <td class="time">{{ $gorecord->go_time }}</td>
            <td class="command"><a href="#" class="edit text-primary">編集</a></td>
            <td class="command"><form action=""><span class="delete text-danger">削除</span></form></td>
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
      <form action="/user/search" method="post" class="search">
        <p class="select_text">ユーザー名</p>
        <select name="u_id" class="select_box mr-4">
          @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->username }}</option>
          @endforeach
        </select>
        <input type="submit" name="submit" class="btn btn-dark" value="検索">
      </form>
      <table border="1" bordercolor="#a8b7c5" class="mypage_table font-medium">
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
            <td class="date">{{ $leaverecord->leave_date }}</td>
            <td class="time">{{ $leaverecord->leave_time }}</td>
            <td class="command"><a href="#" class="edit text-primary">編集</a></td>
            <td class="command"><form action=""><span class="delete text-danger">削除</span></form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@endsection
