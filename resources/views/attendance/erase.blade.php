@extends('layouts.template', ['target' => 'user'])
@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- ユーザー消去 -->
    <div class="col-12 text-center padding">
      <h1 class="font-weight-bold">ユーザー消去</h1>
    </div>
    <form action="/user/{{ $user->id }}" method="post" class="form padding">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="col-12 text-center">
        <p>ユーザー情報を本当に消去しますか？</p>
        <p class="text-danger">※ユーザーの全ての情報が消去されます</p>
        <input type="submit" name="submit" value="消去" class="btn btn-dark" style="border-radius: initial; float: initial">
    </form>
    </div>
  </div>
</div>
@endsection
