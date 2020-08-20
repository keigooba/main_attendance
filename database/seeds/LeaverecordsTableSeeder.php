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
        'leave_date' => Carbon::now(),
        'leave_time' => Carbon::now(),
      ]);
    }
}
