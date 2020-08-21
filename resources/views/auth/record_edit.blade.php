@extends('layouts.template')
@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- 出退勤日時編集 -->
    <div class="col-12 text-center padding">
      <h1 class="font-weight-bold">{{ $motion[0] }}日時編集</h1>
    </div>
    <!-- $motionにはgorecord,leaverecordのいずれかが入る -->
    <form action="/user/{{ $motion[1] }}/{{ $record->id }}" method="post" class="form padding">
      <!-- updateメソッドにはPUTメソッドがルーティングされているのでPUTにする -->
      <input type="hidden" name="_method" value="PUT">
      @csrf
      <div class="col-12">
        <label class="text_area">
          <input type="hidden" name="id" value="{{ $record->id }}">
          <p>ユーザー名</p>
          <input type="text" name="name" value="{{ $record->user_name }}">
        </label>
        <label class="text_area">
          <p>日付</p>
          <input type="text" name="date" id="date" value="{{ $record['record_date']->format('Y/m/d')}}">
        </label>
        <label class="text_area">
          <p>{{ $motion[0] }}時間</p>
          <input type="text" name="time" value="{{ $record['record_time']->format('H:i') }}">
        </label>
        <input type="submit" name="submit" class="btn btn-warning" value="変更">
      </div>
    </form>
  </div>
</div>
<!-- カレンダー機能 -->
<script src="{{ asset('js/date.js') }}"></script>
@endsection
