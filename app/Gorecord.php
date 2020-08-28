<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gorecord extends Model
{
  // Gorecordの日付と時間のフォーマットを指定
  protected $dates = ['record_date','record_time'];

  /**
   * 状態定義
   */
  const RECORD = [
    'flg' => '出勤',
    'class' => 'text-primary'
  ];

  // 独自カラム
  protected $appends = array('go_flg','go_class');

  // 独自カラムのアクセサ
  public function getGoFlgAttribute()
  {
      return self::RECORD['flg'];
  }

  // 独自カラムのアクセサ
  public function getGoClassAttribute()
  {
      return self::RECORD['class'];
  }

}
