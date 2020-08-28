<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    // 以下IDではなく名前を指定した理由はname情報を出勤・退勤テーブルで取得したいため（不都合が多いので本来は外部結合を使ってユーザー名を取得し、nameを使わず、IDで指定する)
    public function gorecords()
    {
        return $this->hasMany('App\Gorecord','user_name','name');
    }

    public function leaverecords()
    {
        return $this->hasMany('App\Leaverecord','user_name','name');
    }


}
