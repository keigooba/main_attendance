<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaverecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = DB::table('users')->first();

      DB::table('leaverecords')->insert([
        'user_name' => $user->name,
        'record_date' => Carbon::now(),
        'record_time' => Carbon::now(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
