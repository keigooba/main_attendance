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

Route::get('/', 'RecordController@index')->name('record');

Route::post('/record', 'RecordController@post');

Route::get('/record/situation', 'RecordController@situation')->name('situation');

Route::post('/record/situation', 'RecordController@situationdate');

Route::post('/gorecord/{id?}', 'GorecordController@destroy');
Route::post('/leaverecord/{id?}', 'LeaverecordController@destroy');

Route::get('/record/help', function() {
  return view('/record/help');
});

Auth::routes();

Route::resource('user','UserController');
