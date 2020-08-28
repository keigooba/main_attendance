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
// *注意事項
// 出勤・退勤テーブルを共通にしてもいいのに分けた理由は、出勤・退勤情報を分けて管理したいからです。User・Gorecord・Leaverecordの3つのテーブルを使用します。
// 出勤だけを指定するときはパスを'/gorecord',コントローラーとしてGorecordController
// 退勤だけを指定するときはパスを'/leaverecord',コントローラーとしてLeaverecordController
// '/record'は出勤・退勤どちらも共通の画面を出したい時に使用
// RecordControllerも同様の理由で出勤・退勤テーブルどちらの情報も取り出したい時に使用

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

  // マイページindex・ユーザー編集edit,update・ユーザー消去ページshow,destroy
  Route::resource('user','UserController');

  // ユーザー名検索 出勤・退勤テーブルどちらも必要
  Route::post('/user/record', 'RecordController@user');

  // 管理者に他のユーザーの出勤・退勤テーブルへの操作権限をあたえるためmiddlewareの指定は例外的に外している（管理者のみに権限を与える方法模索中)
  // Route::group(['middleware' => 'can:view,gorecord'], function() {
    // 出勤編集・編集処理・削除
    Route::get('/user/gorecord/{gorecord}/edit','GorecordController@user_edit');
    Route::put('/user/gorecord/{gorecord}', 'GorecordController@user_update');
    Route::delete('/user/gorecord/{gorecord}', 'GorecordController@user_destroy');
  // });

  // 上記と同じ理由でmiddlewareを例外的に外している
  // Route::group(['middleware' => 'can:view,leaverecord'], function() {
    // 退勤編集・編集処理・削除
    Route::get('/user/leaverecord/{leaverecord}/edit', 'LeaverecordController@user_edit');
    Route::put('/user/leaverecord/{leaverecord}', 'LeaverecordController@user_update');
    Route::delete('/user/leaverecord/{leaverecord}', 'LeaverecordController@user_destroy');
  // });

});

// 管理者ログイン
Route::get('/simple', 'RecordController@simple');
