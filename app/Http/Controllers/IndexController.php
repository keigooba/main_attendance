<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gorecord;
use App\Leaverecord;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
  public function index(Request $request)
  {
      // 登録ユーザーを取得する
      $users = User::all();

      $record = $request->old();

      if($record == null)
      {
        $record = [''];
      }

      return view('index',[
          'users' => $users,
          'record' => $record,
      ]);
  }
}
