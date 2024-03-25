<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all()->orderBy('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:60',
            'author' => 'required|string|min:3|max:60',
            'genre' => 'required|string|min:3|max:60',
            'language' => 'required|string|min:2|max:60',
            'pages' => 'sometimes|required|integer',
            'publisher' => 'sometimes|required|string|min:3|max:60',
        ]);

        return response()->json(
            Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'genre' => $request->genre,
                'language' => $request->language,
                'pages' => $request->pages,
                'publisher' => $request->publisher,
            ])
        );
    }

    public function edit(Book $book)
    {
        return response()->json($book);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:60',
            'author' => 'required|string|min:3|max:60',
            'genre' => 'required|string|min:3|max:60',
            'language' => 'required|string|min:2|max:60',
            'pages' => 'sometimes|required|integer',
            'publisher' => 'sometimes|required|string|min:3|max:60',
        ]);

        return response()->json(
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'genre' => $request->genre,
                'language' => $request->language,
                'pages' => $request->pages,
                'publisher' => $request->publisher,
            ])
        );
    }

    public function destroy(Book $book)
    {
        return $book ? $book->delete() : false;
    }

    public function getEnums()
    {
        return [
            'publishers' => Book::getPulishers(),
            'languages' => Book::getLanguages(),
            'genres' => Book::getGenres(),
        ];
    }
}
