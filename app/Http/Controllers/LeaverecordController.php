<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateLeaverecord;
use App\Leaverecord;

class LeaverecordController extends Controller
{
  public function destroy(Leaverecord $leaverecord)
  {
      $message = ['削除しました'];

      $leaverecord->delete();

      return redirect()->route('situation')->withInput($message);
  }

  public function user_edit(Leaverecord $leaverecord)
  {
      $motion = ['退勤','leaverecord'];

      // 編集画面は出勤レコードと共通なので、変数はrecordで渡す
      return view('auth/record_edit',[
        'motion' => $motion,
        'record' => $leaverecord,
      ]);
  }

  public function user_update(Leaverecord $leaverecord, UserUpdateLeaverecord $request)
  {
      $message = ['変更しました'];

      $leaverecord->user_name = $request->name;
      $leaverecord->record_date = $request->date;
      $leaverecord->record_time = $request->time;
      $leaverecord->save();

      return redirect("/user")->withInput($message);
  }

  public function user_destroy(Leaverecord $leaverecord)
  {

      $message = ['削除しました'];

      $leaverecord->delete();

      return redirect('/user')->withInput($message);
  }

}
