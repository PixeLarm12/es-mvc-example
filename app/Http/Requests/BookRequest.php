<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:60',
            'author' => 'required|string|min:3|max:60',
            'genre' => 'required|string|min:3|max:60',
            'language' => 'required|string|min:2|max:60',
            'pages' => 'required|integer|min:1',
            'publisher' => 'required|string|min:3|max:60',
        ];
    }

    public function getData(): array
    {
        return [
            'title' => $this->input('title'),
            'author' => $this->input('author'),
            'genre' => $this->input('genre'),
            'language' => $this->input('language'),
            'pages' => $this->input('pages'),
            'publisher' => $this->input('publisher'),
        ];   
    }
}
