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

// 認証済みユーザー
Route::group(['middleware' => 'auth'], function() {

  Route::resource('user','UserController');

  Route::post('/user/record', 'RecordController@user');

  // Route::group(['middleware' => 'can:view,gorecord'], function() {

    Route::get('/user/gorecord/{gorecord}/edit','GorecordController@user_edit');
    Route::put('/user/gorecord/{gorecord}', 'GorecordController@user_update');
    Route::delete('/user/gorecord/{gorecord}', 'GorecordController@user_destroy');
  // });

  // Route::group(['middleware' => 'can:view,leaverecord'], function() {

    Route::get('/user/leaverecord/{leaverecord}/edit', 'LeaverecordController@user_edit');
    Route::put('/user/leaverecord/{leaverecord}', 'LeaverecordController@user_update');
    Route::delete('/user/leaverecord/{leaverecord}', 'LeaverecordController@user_destroy');
  // });

});

// 簡易登録
Route::get('/simple', 'RecordController@simple');
