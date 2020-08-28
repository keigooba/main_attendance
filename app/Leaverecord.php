<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaverecord extends Model
{
  // Leaverecordの日付と時間のフォーマットを指定
  protected $dates = ['record_date','record_time'];

    /**
   * 状態定義
   */
  const RECORD = [
    'flg' => '退勤',
    'class' => 'text-danger'
  ];

  // 独自カラム
  protected $appends = array('leave_flg','leave_class');

  // 独自カラムのアクセサ
  public function getLeaveFlgAttribute()
  {
      return self::RECORD['flg'];
  }

  // 独自カラムのアクセサ
  public function getLeaveClassAttribute()
  {
      return self::RECORD['class'];
  }
}
