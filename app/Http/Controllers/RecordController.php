<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DateRecord;
use App\Http\Requests\UserRecord;
use App\User;
use App\Gorecord;
use App\Leaverecord;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

// 出勤・退勤テーブル両方を取り出す時に使用
class RecordController extends Controller
{
  public function index(Request $request)
  {
      // #js-show-msgの情報を受け取る
      $message = $request->old();

      // msgがないなら空にして定義する
      if($message == null)
      {
        $message = [''];
      }

      // 登録ユーザーを全て取得する
      $users = User::all();

      $today = Carbon::now()->toDateString();

      // 今日の出勤記録を全て取得する
      $gorecords = Gorecord::whereDate('record_date',$today)->get();
      // 独自カラムを追加する
      $gorecords->append('go_flg','go_class')->toArray();

      // 今日の退勤記録を全て取得する
      $leaverecords = Leaverecord::whereDate('record_date',$today)->get();
      // 独自カラムを追加する
      $leaverecords->append('leave_flg','leave_class')->toArray();

      return view('record/index',[
        'message' => $message,
        'users' => $users,
        'gorecords' => $gorecords,
        'leaverecords' => $leaverecords,
      ]);
  }

  public function post(Request $request){

    if ($request->input('go')){

      if($request->name == null){

        $message = ['ユーザー名を選択して下さい'];

        return redirect()->route('record')->withInput($message);
      }

      $message = ['出勤しました'];

      // Gorecordモデルのインスタンスを作成する
      $gorecord = new Gorecord();
      // 送信されたユーザー情報を代入する
      $gorecord->user_name = $request->name;
      $gorecord->record_date = Carbon::now();
      $gorecord->record_time = Carbon::now();
      // インスタンスの状態をデータベースに書き込む
      $gorecord->save();

      return redirect()->route('record')->withInput($message);

    }elseif ($request->input('leave')){

      if($request->name == null){

        $message = ['ユーザー名を選択して下さい'];

        return redirect()->route('record')->withInput($message);
      }

      $message = ['退勤しました'];

      // Leaverecordモデルのインスタンスを作成する
      $Leaverecord = new Leaverecord();
      // 送信されたユーザー情報を代入する
      $Leaverecord->user_name = $request->name;
      $Leaverecord->record_date = Carbon::now();
      $Leaverecord->record_time = Carbon::now();
      // インスタンスの状態をデータベースに書き込む
      $Leaverecord->save();

      return redirect()->route('record')->withInput($message);
    }
  }

  public function situation(Request $request){

    // #js-show-msgの情報を受け取る
    $message = $request->old();

    // msgがないなら空にして定義する
    if($message == null)
    {
      $message = [''];
    }

    // 今日の日付を取得する
    $date = date("Y/m/d");

    $today = Carbon::now()->toDateString();

    // 今日の出勤記録を全て取得する
    $gorecords = Gorecord::whereDate('record_date',$today)->get();

    // 今日の退勤記録を全て取得する
    $leaverecords = Leaverecord::whereDate('record_date',$today)->get();

    return view('record/situation',[
      'message' => $message,
      'date' => $date,
      'gorecords' => $gorecords,
      'leaverecords' => $leaverecords,
    ]);
  }

  public function date(DateRecord $request)
  {
      $message = ['検索しました'];

      // 指定された日付の出勤記録を全て取得する
      $gorecords = Gorecord::whereDate('record_date',$request->date)->get();

      // 指定された日付の退勤記録を全て取得する
      $leaverecords = Leaverecord::whereDate('record_date',$request->date)->get();

      return view('record/situation',[
        'message' => $message,
        'date' => $request->date,
        'gorecords' => $gorecords,
        'leaverecords' => $leaverecords,
      ]);
  }

  public function user(UserRecord $request)
  {
      if($request->admin != 1){

        $message = ['管理者しか使えません'];

        return redirect('/user')->withInput($message);
      }

      $message = ['検索しました'];

      $users = User::all();

      // 指定されたユーザー情報を取得する
      $current_user = User::find($request->id);

      // 指定されたユーザーの出勤記録を全て取得する
      $gorecords = $current_user->gorecords()->get();

      // 指定されたユーザーの退勤記録を全て取得する
      $leaverecords = $current_user->leaverecords()->get();

      return view('auth/index',[
        'message' => $message,
        'users' => $users,
        'gorecords' => $gorecords,
        'leaverecords' => $leaverecords,
      ]);
  }

  public function simple()
  {
      // 認証処理をパスしてログイン
      // $user = User::find($user_id);
      // Auth::login($user,true);
      // Auth::attempt()
      Auth::loginUsingId(1, true);

      return redirect('/user');
  }
}
