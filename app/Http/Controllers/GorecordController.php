<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gorecord;

class GorecordController extends Controller
{
  public function destroy($id)
  {
      // 出勤IDに紐づくデータを取得する
      $gorecord = Gorecord::findOrFail($id);
      $gorecord->delete();

      return redirect()->route('situation');
  }
}
