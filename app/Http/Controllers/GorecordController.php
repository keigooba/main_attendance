<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gorecord;

class GorecordController extends Controller
{
  public function edit(int $id)
  {
      $motion = ['出勤','gorecord'];

      // 出勤IDに紐づくデータを取得する
      $record = Gorecord::findOrFail($id);

      return view('auth/record_edit',[
        'motion' => $motion,
        'record' => $record,
      ]);
  }

  public function update(Request $request)
  {
      // 出勤IDに紐づくデータを取得する
      $gorecord = Gorecord::findOrFail($request->id);

      $gorecord->user_name = $request->name;
      $gorecord->record_date = $request->date;
      $gorecord->record_time = $request->time;
      $gorecord->save();

      return redirect("/user");
  }

  public function destroy(int $id)
  {
      // 出勤IDに紐づくデータを取得する
      $gorecord = Gorecord::findOrFail($id);
      $gorecord->delete();

      return redirect()->route('situation');
  }
}
