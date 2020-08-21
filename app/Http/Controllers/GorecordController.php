<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateGorecord;
use App\Gorecord;

class GorecordController extends Controller
{
  public function destroy(Gorecord $gorecord)
  {
      $message = ['削除しました'];

      $gorecord->delete();

      return redirect()->route('situation')->withInput($message);
  }

  public function user_edit(Gorecord $gorecord)
  {
      $motion = ['出勤','gorecord'];

      // 編集画面は退勤レコードと共通なので、変数はrecordで渡す
      return view('auth/record_edit',[
        'motion' => $motion,
        'record' => $gorecord,
      ]);
  }

  public function user_update(Gorecord $gorecord, UserUpdateGorecord $request)
  {
      $message = ['変更しました'];

      $gorecord->user_name = $request->name;
      $gorecord->record_date = $request->date;
      $gorecord->record_time = $request->time;
      $gorecord->save();

      return redirect("/user")->withInput($message);
  }

  public function user_destroy(Gorecord $gorecord)
  {
      $message = ['削除しました'];

      $gorecord->delete();

      return redirect('user')->withInput($message);
  }
}
