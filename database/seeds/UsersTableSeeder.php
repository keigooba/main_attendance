<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'id' => '1',
        'name' => '大庭慶吾',
        'email' => 'keigo2356@gmail.com',
        'password' => bcrypt('2356'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }

}
