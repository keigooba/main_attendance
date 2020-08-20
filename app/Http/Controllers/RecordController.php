<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DateRecord;
use App\User;
use App\Gorecord;
use App\Leaverecord;
use Carbon\Carbon;

class RecordController extends Controller
{
  public function index(Request $request)
  {
      // #js-show-msgの情報を受け取る
      $record = $request->old();

      // msgがないなら空にして定義する
      if($record == null)
      {
        $record = [''];
      }

      // 登録ユーザーを全て取得する
      $users = User::all();

      return view('record/index',[
          'record' => $record,
          'users' => $users,
      ]);
  }

  public function post(request $request){

    if ($request->input('go')){

      if($request->name == null){

        $record = ['ユーザー名を選択して下さい'];

        return redirect()->route('record')->withInput($record);
      }

      $record = ['出勤しました'];

      // Gorecordモデルのインスタンスを作成する
      $gorecord = new Gorecord();
      // 送信されたユーザー情報を代入する
      $gorecord->user_name = $request->name;
      $gorecord->go_date = Carbon::now();
      $gorecord->go_time = Carbon::now();
      // インスタンスの状態をデータベースに書き込む
      $gorecord->save();

      return redirect()->route('record')->withInput($record);

    }elseif ($request->input('leave')){

      if($request->name == null){

        $record = ['ユーザー名を選択して下さい'];

        return redirect()->route('record')->withInput($record);
      }

      $record = ['退勤しました'];

      // Leaverecordモデルのインスタンスを作成する
      $Leaverecord = new Leaverecord();
      // 送信されたユーザー情報を代入する
      $Leaverecord->user_name = $request->name;
      $Leaverecord->leave_date = Carbon::now();
      $Leaverecord->leave_time = Carbon::now();
      // インスタンスの状態をデータベースに書き込む
      $Leaverecord->save();

      return redirect()->route('record')->withInput($record);
    }
  }

  public function situation(){

    $today = Carbon::now()->toDateString();

    // 今日の日付を取得する
    $date = date("Y/m/d");

    // 今日の出勤記録を全て取得する
    $gorecords = Gorecord::whereDate('go_date',$today)->get();

    // 今日の退勤記録を全て取得する
    $leaverecords = Leaverecord::whereDate('leave_date',$today)->get();

    return view('record/situation',[
      'date' => $date,
      'gorecords' => $gorecords,
      'leaverecords' => $leaverecords,
    ]);
  }

  public function situationdate(DateRecord $request)
  {
      // 指定された日付の出勤記録を全て取得する
      $gorecords = Gorecord::whereDate('go_date',$request->date)->get();

      // 指定された日付の退勤記録を全て取得する
      $leaverecords = Leaverecord::whereDate('leave_date',$request->date)->get();

      return view('record/situation',[
        'date' => $request->date,
        'gorecords' => $gorecords,
        'leaverecords' => $leaverecords,
      ]);
  }
}
