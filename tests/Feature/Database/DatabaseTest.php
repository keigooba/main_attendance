<?php

namespace Tests\Feature\Database;

use \Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Book;

class DatabaseTest extends TestCase
{
    use DatabaseTransactions;

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
