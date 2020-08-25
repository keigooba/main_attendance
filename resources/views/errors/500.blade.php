@extends('layouts.template')

@section('content')
<div class="container" style="height:795px">
  <div class="row">
    <div class="col-12 text-center p-4 m-4">
      <p>申し訳ございません。Webサイトはこのページを表示できません。<br>システム管理者にお問い合わせ下さい。</p>
      @guest
      <a class="btn btn-dark text-light mt-4" href="/">
      @else
      <a class="btn btn-dark text-light mt-4"  href="/user">
      @endguest
        トップページに戻る
      </a>

    </div>
  </div>
</div>
@endsection
