<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaverecord;

class LeaverecordController extends Controller
{
  public function edit(Leaverecord $leaverecord)
  {
      $motion = ['退勤','leaverecord'];

      // 退勤IDに紐づくデータを取得する
      // $record = Leaverecord::findOrFail($id);

      return view('auth/record_edit',[
        'motion' => $motion,
        'record' => $record,
      ]);
  }

  public function update(Request $request)
  {
      // 退勤IDに紐づくデータを取得する
      // $leaverecord = Leaverecord::findOrFail($request->id);

      $leaverecord->user_name = $request->name;
      $leaverecord->record_date = $request->date;
      $leaverecord->record_time = $request->time;
      $leaverecord->save();

      return redirect("/user");
  }

  public function destroy(Leaverecord $leaverecord)
  {

      $leaverecord->delete();

      return redirect()->route('situation');
  }

}
