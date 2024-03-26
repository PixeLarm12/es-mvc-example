<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Collection;

class BookRepository
{
    public function getAll(): Collection
    {
        return Book::orderBy('title')->get();
    }

    public function store($data): bool
    {
        return (bool) Book::create($data);
    }

    public function update($book, $data): bool
    {
        return (bool) $book->update($data);
    }

    public function delete($book): bool
    {
        return (bool) $book->delete();
    }

    public function getEnums(): array
    {
        return [
            'publishers' => Book::getPulishers(),
            'languages' => Book::getLanguages(),
            'genres' => Book::getGenres(),
        ];
    }
}