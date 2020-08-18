<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gorecord;
use App\Leaverecord;
use Carbon\Carbon;

class RecordController extends Controller
{
  public function postRecord(Request $request){

    if ($request->input('go')){

      $record = ['出勤しました'];

      // Gorecordモデルのインスタンスを作成する
      $gorecord = new Gorecord();
      // 送信されたユーザー情報を代入する
      $gorecord->user_id = $request->id;
      $gorecord->go_date = Carbon::now();
      $gorecord->go_time = Carbon::now();
      // インスタンスの状態をデータベースに書き込む
      $gorecord->save();

      return redirect()->route('home')->withInput($record);

    }elseif ($request->input('leave')){

      $record = ['退勤しました'];

      // Leaverecordモデルのインスタンスを作成する
      $Leaverecord = new Leaverecord();
      // 送信されたユーザー情報を代入する
      $Leaverecord->user_id = $request->id;
      $Leaverecord->leave_date = Carbon::now();
      $Leaverecord->leave_time = Carbon::now();
      // インスタンスの状態をデータベースに書き込む
      $Leaverecord->save();

      return redirect()->route('home')->withInput($record);
      }
  }

}
