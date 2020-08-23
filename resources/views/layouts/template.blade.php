<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!-- viewport meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Attendance') }}</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- タイトル用フォント -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
  <!-- フォントアイコン -->
  <script src="https://kit.fontawesome.com/c4d6181f75.js" crossorigin="anonymous"></script>
  <!-- style css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- デフォルトのスタイルシート -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <!-- ブルーテーマの追加スタイルシート -->
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
  <!-- ヘッダー -->
  <header>
    <nav class="navbar navbar-light bg-lightblue fixed-top font-medium font-weight-bold" id="header">
    <div class="container-fluid">
    @guest
      <a class="header_title " href="/">
    @else
      <a class="header_title " href="/user">
    @endguest
        <i class="fas fa-door-open"></i>
        {{ config('app.name', 'Attendance') }}
      </a>

      <!-- ハンバーガーメニュー -->
      <div id="js-nav-toggle">
        <div class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <nav class="header_nav">
        <ul id="nav-toggle-2">
        @guest
          <li><a href="/simple" class="nav_link btn-warning text-success">簡易ログイン</a></li>
          <li><a href="/help" class="nav_link">使い方</a></li>
          <li><a href="{{ route('register') }}" class="nav_link">{{ __('Register') }}</a></li>
          <li><a href="{{ route('login') }}" class="nav_link">{{ __('Login') }}</a></li>
        @else
          <li>
            <a class="nav_link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          </li>
          <li><a href="/user/{{ Auth::user()->id }}" class="nav_link">ユーザー消去</a></li>
          <li><a href="/user/{{ Auth::user()->id }}/edit" class="nav_link">ユーザー編集</a></li>
          <li><a href="/user" class="nav_link">{{ Auth::user()->name }}さん</a></li>
        @endguest
        </ul>
      </nav>
    </div>
    </nav>
  </header>

  @yield('content')

  <!-- フッター -->
  <footer>
    <div class="container-fluid bg-lightblue font-small" id="footer">
      <div class="row text-center pt-2">
        <!-- 各種操作一覧 -->
        @guest
        <div class="col-md-2 operation">
          <p class="font-weight-bold mb-2">基本操作</p>
          <ul>
            <li><a href="{{ route('situation') }}">出退勤状況</a></li>
            <li><a href="/help">使い方</a></li>
            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
          </ul>
        </div>
        @else
        <div class="col-md-2 operation">
          <p class="font-weight-bold mb-2">ユーザー操作</p>
          <ul>
            <li>
              <a class="nav_link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </li>
            <li><a href="/user/{{ Auth::user()->id }}" class="nav_link">ユーザー消去</a></li>
            <li><a href="/user/{{ Auth::user()->id }}/edit" class="nav_link">ユーザー編集</a></li>
            <li><a href="/user" class="nav_link">{{ Auth::user()->name }}さん</a></li>
          </ul>
        </div>
        @endguest
      </div>
    </div>
    <!-- Copyright -->
    <div class="container-fluid  bg-brown text-white" id="copyright">
      <div class="row text-center">
        <div class="col-12">
          Copyright(C) Attendance.All Rights Reasearved.
        </div>
      </div>
    </div>
  </footer>

  <!-- flatpickrスクリプト -->
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <!-- 日本語化のための追加スクリプト -->
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>

  <!-- テンプレートScripts -->
  <script src="{{ asset('js/template.js') }}"></script>

</body>
