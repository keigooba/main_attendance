<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gorecord;
use App\Leaverecord;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // 登録ユーザーを取得する
        $users = User::all();

        $record = $request->old();

        if($record == null)
        {
          $record = [''];
        }



        return view('home',[
            'users' => $users,
            'record' => $record,
        ]);
    }
}
