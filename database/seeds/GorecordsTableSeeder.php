<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GorecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = DB::table('users')->first();

      DB::table('gorecords')->insert([
        'user_id' => $user->id,
        'go_date' => Carbon::now(),
        'go_time' => Carbon::now(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);


    }
}
