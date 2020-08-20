<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gorecord;
use App\Leaverecord;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

      // 登録ユーザーの出勤情報を全て取得する
      $gorecords = Auth::user()->gorecords()->get();

      // 登録ユーザーの退勤情報を全て取得する
      $leaverecords = Auth::user()->leaverecords()->get();

      return view('auth/index',[
        'record' => $record,
        'users' => $users,
        'gorecords' => $gorecords,
        'leaverecords' => $leaverecords,
      ]);

    }
}
