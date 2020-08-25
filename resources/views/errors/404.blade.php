@extends('layouts.template')

@section('content')
<div class="container" style="height:795px">
  <div class="row">
    <div class="col-12 text-center p-4 m-4">
      <p>お探しのページは見つかりませんでした。</p>
      @guest
      <a class="btn btn-dark text-light mt-4" href="/">
      @else
      <a class="btn btn-dark text-light mt-4" href="/user">
      @endguest
        トップページに戻る
      </a>
    </div>
  </div>
</div>
@endsection
