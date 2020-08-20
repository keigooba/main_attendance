<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;
use App\Http\Requests\DateRecord;

class RecordTest extends TestCase
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

    public function setUp() :void
    {
        parent::setUp();

        // テストケース実行前に出勤データを作成する
        $this->seed('GorecordsTableSeeder');
    }

    /**
     * 期限日が過去日付の場合はバリデーションエラー
     * @test
     */
    public function date_should_be_date()
    {
        $response = $this->post('/record', [
            'date' => 123, // 不正なデータ（数値）
        ]);

        // dd($response);

        $response->assertSessionHasErrors([
            'date' => '期限日 には日付を入力してください。',
        ]);
    }
}
