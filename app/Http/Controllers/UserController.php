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
      $message = $request->old();

      // msgがないなら空にして定義する
      if($message == null)
      {
        $message = [''];
      }

      // 登録ユーザーを全て取得する
      $users = User::all();

      // 認証ユーザーの出勤情報を全て取得する
      $gorecords = Auth::user()->gorecords()->get();

      // 認証ユーザーの退勤情報を全て取得する
      $leaverecords = Auth::user()->leaverecords()->get();

      return view('auth/index',[
        'message' => $message,
        'users' => $users,
        'gorecords' => $gorecords,
        'leaverecords' => $leaverecords,
      ]);

    }
    public function edit(int $id)
    {
      return view('/auth/edit');
    }

    public function update(Request $request)
    {
      Auth::user()->name = $request->name;
      Auth::user()->email = $request->email;
      Auth::user()->password = $request->password;
      Auth::user()->save();

      redirect('/user');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    public function show(int $id)
    {
      return view('/auth/destroy');
    }

    public function destroy(int $id)
    {
      // ユーザーに紐づく出勤レコード削除
      Auth::user()->gorecords()->delete();

      // ユーザーに紐づく退勤レコード削除
      Auth::user()->leaverecords()->delete();

      // ユーザー削除
      Auth::user()->delete();

      return redirect('/');
    }
}
