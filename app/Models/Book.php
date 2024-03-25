<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public const BOOK_SCI_FI = 'sci-fi';
    public const BOOK_FANTASY = 'fantasy';
    public const BOOK_THRILLER = 'thriller';
    public const BOOK_WESTERN = 'western';
    public const BOOK_ROMANCE = 'romance';

    public const BOOK_LANG_PTBR = 'ptbr';
    public const BOOK_LANG_ENGLISH = 'en';
    public const BOOK_LANG_SPANISH = 'es';
    public const BOOK_LANG_CHINESE = 'ch';
    public const BOOK_LANG_GERMAN = 'gr';

    public const BOOK_PUB_HARPER = 'harper-collins';
    public const BOOK_PUB_ROCCO = 'rocco';
    public const BOOK_PUB_PEARSON = 'pearson';
    public const BOOK_PUB_FTD = 'editora-ftd';

    protected $table = "books";

    protected $fillable = [
        'title',
        'author',
        'genre',
        'language',
        'pages',
        'publisher',
    ];

    public static function getGenreByKey($key)
    {
        $genres = self::getGenres();

        foreach($genres as $genre) {
            if($genre['key'] == $key) {
                return $genre;
            }
        }
    }

    public static function getGenres()
    {
        return [
            [
                'key' => self::BOOK_SCI_FI,
                'label' => 'Science Fiction',
            ],
            [
                'key' => self::BOOK_FANTASY,
                'label' => 'Fantasy',
            ],
            [
                'key' => self::BOOK_THRILLER,
                'label' => 'Thriller',
            ],
            [
                'key' => self::BOOK_WESTERN,
                'label' => 'Western',
            ],
            [
                'key' => self::BOOK_ROMANCE,
                'label' => 'Romance',
            ],
        ];
    }

    public static function getLanguageByKey($key)
    {
        $langs = self::getLanguages();

        foreach($langs as $lang) {
            if($lang['key'] == $key) {
                return $lang;
            }
        }
    }

    public static function getLanguages()
    {
        return [
            [
                'key' => self::BOOK_LANG_PTBR,
                'label' => 'Portuguese (Brazil)',
            ],
            [
                'key' => self::BOOK_LANG_SPANISH,
                'label' => 'Spanish',
            ],
            [
                'key' => self::BOOK_LANG_GERMAN,
                'label' => 'German',
            ],
            [
                'key' => self::BOOK_LANG_ENGLISH,
                'label' => 'English (US)',
            ],
            [
                'key' => self::BOOK_LANG_CHINESE,
                'label' => 'Chinese',
            ],
        ];
    }

    public static function getPulisherByKey($key)
    {
        $publishers = self::getPulishers();

        foreach($publishers as $publisher) {
            if($publisher['key'] == $key) {
                return $publisher;
            }
        }
    }

    public static function getPulishers()
    {
        return [
            [
                'key' => self::BOOK_PUB_HARPER,
                'label' => 'Harper Collins',
            ],
            [
                'key' => self::BOOK_PUB_ROCCO,
                'label' => 'Rocco',
            ],
            [
                'key' => self::BOOK_PUB_PEARSON,
                'label' => 'Pearson',
            ],
            [
                'key' => self::BOOK_PUB_FTD,
                'label' => 'Editora FTD',
            ],
        ];
    }
}
