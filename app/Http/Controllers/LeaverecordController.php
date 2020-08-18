<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaverecord;

class LeaverecordController extends Controller
{
  public function leave(Request $request){

    // Leaverecordモデルのインスタンスを作成する
    $Leaverecord = new Leaverecord();
    // 送信されたユーザー情報を代入する
    $Leaverecord->user_id = $request->user_id;
    // $Leaverecord->go_date => Carbon::now();
    // $Leaverecord->go_time => Carbon::now();
    // インスタンスの状態をデータベースに書き込む
    $Leaverecord->save();

    return redirect()->route('home');

  }
}
