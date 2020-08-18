<?php

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
        'password' => bcrypt('test1234'),
      ]);
    }

}
