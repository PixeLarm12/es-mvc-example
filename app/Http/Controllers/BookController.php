<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Repositories\BookRepository;

class BookController extends Controller
{
    protected $repository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->repository = $bookRepository;
    }
    
    public function index()
    {
        return response()->json($this->repository->getAll());
    }

    public function store(BookRequest $request)
    {
        if($request->validated()) {
            return response()->json($this->repository->store($request->getData()));
        }

        return response()->json([]);
    }

    public function edit(Book $book)
    {
        return response()->json($book);
    }

    public function update(BookRequest $request, Book $book)
    {
        if($request->validated()) {
            return response()->json($this->repository->update($book, $request->getData()));
        }

        return response()->json([]);
    }

    public function destroy(Book $book)
    {
        return response()->json($this->repository->delete($book));
    }

    public function enums()
    {
        return response()->json($this->repository->getEnums());
    }
}
