@extends('layouts.template')
@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- ユーザー削除 -->
    <div class="col-12 text-center padding">
      <h1 class="font-weight-bold">ユーザー削除</h1>
    </div>
    <form action="/user/{{ Auth::user()->id }}" method="post" class="form padding">
      <input type="hidden" name="_method" value="DELETE">
      @csrf
      <div class="col-12 text-center">
        <p><span class="font-weight-bold">{{Auth::user()->name}}</span>を本当に削除しますか？</p>
        <p class="text-danger"><span class="font-weight-bold">{{Auth::user()->name}}</span>の全ての情報が削除されます。</p>
        <input type="submit" name="submit" value="削除" class="btn btn-dark" style="border-radius: initial; float: initial">
      </div>
    </form>
  </div>
</div>
@endsection
