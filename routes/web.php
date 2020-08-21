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
Route::delete('/gorecord/{gorecord}', 'GorecordController@destroy');
Route::delete('/leaverecord/{leaverecord}', 'LeaverecordController@destroy');

// 使い方ページ
Route::get('/help', function() {
  return view('record/help');
});

// ログインページ・ログアウト・ユーザー登録ページ
Auth::routes();

// マイページ・ユーザー編集ページ・ユーザー消去ページ
Route::resource('user','UserController');
Route::post('/user/record', 'RecordController@user');
Route::post('/user/gorecord/{gorecord}', 'GorecordController@destroy');
Route::post('/user/leaverecord/{leaverecord}', 'LeaverecordController@destroy');

// 出退勤編集ページ
Route::get('/user/gorecord/{gorecord}/edit', 'GorecordController@edit');
Route::get('/user/leaverecord/{leaverecord}/edit', 'LeaverecordController@edit');
Route::put('/user/gorecord/{gorecord}', 'GorecordController@update');
Route::put('/user/leaverecord/{leaverecord}', 'LeaverecordController@update');
