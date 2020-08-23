@extends('layouts.template')

@section('content')
<!-- メインメニュー -->
<div class="container-fluid padding" id="main">
  <div class="row">
    <!-- タイトル -->
    <div class="col-12 text-center padding">
      <h1 class="font-weight-bold">{{ __('Reset Mailsand_Password') }}</h1>
    </div>
    <!-- フォーム -->
    @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif
    <form action="{{ route('password.email') }}" method="post" class="form padding">
      @csrf
      <div class="col-12">

        <label class="text_area">
          <p>{{ __('E-Mail Address') }}</p>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </label>

        <input type="submit" name="submit" class="btn btn-primary">


      </div>
    </form>
  </div>
</div>
@endsection
