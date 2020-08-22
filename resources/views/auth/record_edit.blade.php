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
          <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ $record->user_name }}" required autocomplete="name" autofocus>
          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>
        <label class="text_area">
          <p>日付</p>
          <input type="text" name="date" class="form-control @error('date') is-invalid @enderror" id="date" value="{{ $record['record_date']->format('Y/m/d')}}">
          @error('date')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>
        <label class="text_area">
          <p>{{ $motion[0] }}時間</p>
          <input type="text" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ $record['record_time']->format('H:i') }}">
          @error('time')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>
        <input type="hidden" name="admin" value="{{ Auth::user()->id }}">
        <input type="submit" name="submit" class="btn btn-warning" value="変更">
      </div>
    </form>
  </div>
</div>
<!-- カレンダー機能 -->
<script src="{{ asset('js/date.js') }}"></script>
@endsection
