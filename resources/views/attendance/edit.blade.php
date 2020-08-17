@extends('layouts.template', ['target' => 'user'])
@section('content')
@include('attendance/form', ['target' => 'update'])
@endsection
