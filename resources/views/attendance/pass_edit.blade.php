@extends('layouts.template', ['target' => 'user'])
@section('content')
@include('attendance/form', ['target' => 'pass_edit'])
@endsection
