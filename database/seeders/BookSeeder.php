<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::insert([
            [
                'title' => 'The Hobbit',
                'author' => 'J. R. R. Tolkien',
                'genre' => Book::BOOK_ROMANCE,
                'language' => Book::BOOK_LANG_ENGLISH,
                'pages' => 387,
                'publisher' => Book::BOOK_PUB_HARPER,
            ],
            [
                'title' => "Harry Potter e a Pedra Filosofal",
                'author' => 'J.K. Rowling',
                'genre' => Book::BOOK_FANTASY,
                'language' => Book::BOOK_LANG_PTBR,
                'pages' => 345,
                'publisher' => Book::BOOK_PUB_ROCCO,
            ],
        ]);
    }
}
