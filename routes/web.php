<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// トップページ
Route::get('/', 'RecordController@index')->name('record');
Route::post('/record', 'RecordController@post');

// 出退勤状況ページ
Route::get('/situation', 'RecordController@situation')->name('situation');
Route::post('/situation', 'RecordController@date');
Route::delete('/gorecord/{id?}', 'GorecordController@destroy');
Route::delete('/leaverecord/{id?}', 'LeaverecordController@destroy');

// 使い方ページ
Route::get('/help', function() {
  return view('/help');
});

Auth::routes();

// マイページ・ユーザー編集・ユーザー消去
Route::resource('user','UserController');
Route::post('user/record', 'RecordController@user');
Route::post('/user/gorecord/{id?}', 'GorecordController@destroy');
Route::post('/user/leaverecord/{id?}', 'LeaverecordController@destroy');

// 出退勤編集ページ
Route::get('user/gorecord/{id?}/edit', 'GorecordController@edit');
Route::get('user/leaverecord/{id?}/edit', 'LeaverecordController@edit');
Route::put('user/gorecord/{id?}', 'GorecordController@update');
Route::put('user/leaverecord/{id?}', 'LeaverecordController@update');
