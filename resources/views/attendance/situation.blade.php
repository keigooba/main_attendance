@extends('attendance/layout', ['target' => 'default'])
@section('content')
    <!-- メインメニュー -->
    <div class="container-fluid padding" id="main">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="font-weight-bold">出退勤状況</h1>
      </div>
      <!-- 出勤状況 -->
      <div class="col-md-6 table_container">
        <div class="text-center">
          <h1 class="font-weight-bold text-primary mb-2">出勤状況</h1>
          <form action="" method="post" class="search">
            <label>
              <p style="text-align: initial">日付</p>
              <input type="text" name="date" value="今日の日付">
            </label>
            <input type="submit" name="submit" class="btn btn-dark mb-2 ml-4" value="検索">
          </form>
          <!-- 出勤テーブル -->
          <table border="1" bordercolor="#a8b7c5" class="situation_table font-medium">
            <thead class="bg-primary text-white">
              <tr>
                <th class="id">ID</th>
                <th class="user">ユーザー名</th>
                <th class="time">時間</th>
                <th class="command"></th>
              </tr>
            </thead>
            <tbody class="js-scroll-bottom">
              @foreach($goings as $going)
              <tr>
                <td class="id">{{ $going->id }}</td>
                <td class="user">{{ $going->u_name }}</td>
                <td class="time">{{ $going->going_time }}</td>
                <td class="command"><form action=""><span class="delete text-danger">削除</span></form></td>
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
          <form action="" method="post" class="search">
            <label>
              <p style="text-align: initial">日付</p>
              @foreach($leavings as $leaving)
              <input type="text" name="date" value="今日の日付">
              @endforeach
            </label>
            <input type="submit" name="submit" class="btn btn-dark mb-2 ml-4" value="検索">
          </form>
          <!-- 退勤テーブル -->
          <table border="1" bordercolor="#a8b7c5" class="situation_table font-medium">
            <thead class="bg-danger text-white">
              <tr>
                <th class="id">ID</th>
                <th class="user">ユーザー名</th>
                <th class="time">時間</th>
                <th class="command"></th>
              </tr>
            </thead>
            <tbody class="js-scroll-bottom">
              @foreach($leavings as $leaving)
              <tr>
                <td class="id">{{ $leaving->id }}</td>
                <td class="user">{{ $leaving->u_name }}</td>
                <td class="time">{{ $leaving->leaving_time }}</td>
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
