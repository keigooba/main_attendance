<?php

namespace Tests\Feature\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Book;

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
        $book = new Book();
        $book->title = 'hoge';
        $book->author = 'tarou';
        $saveBook = $book->save();

        $book = [
            'title' => 'hoge',
        ];
        $this->assertDatabaseHas('books', $book);
    }
    
}
