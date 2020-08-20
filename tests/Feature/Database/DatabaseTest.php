<?php

namespace Tests\Feature\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Gorecord;
use App\Leaverecord;
use App\User;
use Carbon\Carbon;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    use RefreshDatabase;

    public function testDatabase()
    {
        $user = new User();
        $user->name = '山田太郎';
        $user->email = 'tarou';
        $user->password = bcrypt('test1234');
        $saveUser = $user->save();

        $user = [
            'name' => '山田太郎',
        ];
        $this->assertDatabaseHas('users', $user);

        $gorecord = new Gorecord();
        $gorecord->user_name = '山田太郎';
        $gorecord->record_date = Carbon::now();
        $gorecord->record_time = Carbon::now();
        $saveGorecord = $gorecord->save();

        $gorecord = [
            'record_date' =>  Carbon::now()->toDateString(),
        ];
        $this->assertDatabaseHas('gorecords', $gorecord);

        $leaverecord = new Leaverecord();
        $leaverecord->user_name = '山田太郎';
        $leaverecord->record_date = Carbon::now();
        $leaverecord->record_time = Carbon::now();
        $saveLeaverecord = $leaverecord->save();

        $leaverecord = [
            'record_date' =>  Carbon::now()->toDateString(),
        ];
        $this->assertDatabaseHas('leaverecords', $leaverecord);
    }

}
