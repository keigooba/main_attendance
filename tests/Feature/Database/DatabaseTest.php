<?php

namespace Tests\Feature\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Book;

class DatabaseTest extends TestCase
{
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
