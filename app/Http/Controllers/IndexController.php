<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class IndexController extends Controller
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

      return view('index',[
          'record' => $record,
          'users' => $users,
      ]);
  }
}
