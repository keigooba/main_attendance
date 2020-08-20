<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaverecord;

class LeaverecordController extends Controller
{
  public function destroy($id)
  {
      // 退勤IDに紐づくデータを取得する
      $leaverecord = Leaverecord::findOrFail($id);
      $leaverecord->delete();

      return redirect()->route('situation');
  }
}
