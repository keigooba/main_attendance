<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Attendance</title>
  <!-- viewport meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- タイトル用フォント -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
  <!-- フォントアイコン -->
  <script src="https://kit.fontawesome.com/c4d6181f75.js" crossorigin="anonymous"></script>
  <!-- style css -->
  <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
</head>
<body>

  <!-- ヘッダー -->
  <header>
    <nav class="navbar navbar-light bg-lightblue fixed-top" id="header">
    <div class="container-fluid">
      <a class="header_title" href="/user"><i class="fas fa-door-open"></i>Attendance</a>
      <!-- ハンバーガーメニュー -->
      <div id="js-nav-toggle">
        <div class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <nav class="header_nav font-medium">
        <ul id="nav-toggle-2">
          @if($target == 'default')
          <li><a href="/help" class="nav_link">使い方</a></li>
          <li><a href="/user/create" class="nav_link">ユーザー登録</a></li>
          <li><a href="/login" class="nav_link">ログイン</a></li>
          @elseif($target == 'user')
          <li><a href="/logout" class="nav_link">ログアウト</a></li>
          <li><a href="/pass_edit" class="nav_link">パスワード変更</a></li>
          <li><a href="/erase" class="nav_link">ユーザー消去</a></li>
          <li><a href="/user/{{ 1 }}/edit" class="nav_link">ユーザー編集</a></li>
          <li><a href="/mypage" class="nav_link">マイページ</a></li>
          @endif
        </ul>
      </nav>
    </div>
    </nav>
  </header>

  @yield('content')

  <!-- フッター -->
  <footer>
    <div class="container-fluid bg-lightblue" id="footer">
      <div class="row text-center pt-2">
        <!-- 各種操作一覧 -->
        <div class="col-md-2 operation">
          <p class="font-weight-bold mb-2">Attendanceについて</p>
          <ul>
            <li><a href="#">出勤状況</a></li>
            <li><a href="#">使い方</a></li>
          </ul>
        </div>
        <div class="col-md-2 operation">
          <p class="font-weight-bold mb-2">ユーザー操作一覧</p>
          <ul>
            <li><a href="#">ユーザー登録</a></li>
            <li><a href="#">ログイン</a></li>
            <li><a href="#">マイページ</a></li>
            <li><a href="#">ユーザー情報編集</a></li>
          </ul>
        </div>
        <div class="col-md-2 operation">
          <p class="mb-2" style="height:24px"></p>
          <ul>
            <li><a href="#">パスワード変更</a></li>
            <li><a href="#">ユーザー消去</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Copyright -->
    <div class="container-fluid  bg-brown text-white" id="copyright">
      <div class="row text-center">
        <div class="col-12" style="line-height:220%;">
          Copyright(C) Attendance.All Rights Reasearved.
        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <!-- スクリプト -->
  <script>
    $(function() {

      //ハンバーガーメニュー
      $('#js-nav-toggle').on('click',function() {
        $('#js-nav-toggle,.header_nav').toggleClass('show');
      });

      // メッセージ表示
      var $jsShowMsg = $('#js-show-msg');
      var msg = $jsShowMsg.text();
      if(msg.replace(/^[\s　]+|[\s　]+$/g, "").length){
        $jsShowMsg.slideToggle('slow');
        setTimeout(function() { $jsShowMsg.slideToggle('slow'); }, 1500);
      }

      // 最新情報まで自動スクロール
      $('.js-scroll-bottom').animate({scrollTop: $('.js-scroll-bottom')[0].scrollHeight}, 'fast');

    });
  </script>

</body>
