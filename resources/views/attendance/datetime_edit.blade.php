@extends('layouts.template', ['target' => 'user'])
@section('content')
    <!-- メインメニュー -->
    <div class="container-fluid padding" id="main">
      <div class="row">
        <!-- 出退勤日時編集 -->
        <div class="col-12 text-center padding">
          <h1 class="font-weight-bold">出退勤日時編集</h1>
        </div>
        <form action="" method="post" class="form padding">
          <div class="col-12">
            <label class="text_area">
              <p>ID</p>
              <input type="text" name="id" value="1" placeholder="※数字入力">
            </label>
            <label class="text_area">
              <p>ユーザー名</p>
              <input type="text" name="name" value="大庭 博美" placeholder="※漢字入力">
            </label>
            <label class="text_area">
              <p>日付</p>
              <input type="text" name="date" value="2020/07/28" placeholder="※日付形式で入力">
            </label>
            <label class="text_area">
              <p>出退勤時間</p>
              <input type="text" name="time" value="09:00" placeholder="※時間形式で入力">
            </label>
            <input type="submit" name="submit" class="btn btn-warning" value="変更">
        </form>
        </div>
      </div>
    </div>
@endsection
