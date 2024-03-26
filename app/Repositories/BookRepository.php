<?php

namespace App\Repositories;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Support\Collection;

class BookRepository
{
    public function getAll(): Collection
    {
        return Book::orderBy('title')->get();
    }

    public function store(BookRequest $request): bool
    {
        if($request->validated()) {
            return (bool) Book::create($request->getData());
        }

        return false;
    }

    public function update($book, BookRequest $request): bool
    {
        if($request->validated()) {
            return (bool) $book->update($request->getData());
        }

        return false;
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