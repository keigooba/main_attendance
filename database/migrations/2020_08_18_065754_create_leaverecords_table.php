<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaverecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaverecords', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->date('leave_date');
          $table->time('leave_time');
          $table->timestamps();

          // 外部キーを設定する
          // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaverecords');
    }
}
