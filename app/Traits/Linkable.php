<?php

namespace App\Traits;

trait Linkable
{
    protected static $providers = [
        'amazon' => [
            'name' => 'Amazon',
            'url' => 'https://www.amazon.com/gp/product/{id}',
            'color' => 'orange'
        ],
        'mobi-asin' => [
            'name' => 'Kindle',
            'url' => 'https://www.amazon.com/gp/product/{id}',
        ],
        'google' => [
            'name' => 'Google Books',
            'url' => 'https://play.google.com/store/books/details?id={id}',
        ],
        'barnesnoble' => [
            'name' => 'Barnes & Noble',
            'url' => 'https://www.barnesandnoble.com/{id}',
        ],
        'bookfusion' => [
            'name' => 'Bookfusion',
            'url' => 'https://www.bookfusion.com/books/{id}',
        ]
    ];

    public function getUrlAttribute()
    {
        if (array_key_exists($this->type, self::$providers)) {
            return str_replace('{id}', $this->val, self::$providers[$this->type]['url']);
        }
    }

    public function getNameAttribute()
    {
        if (array_key_exists($this->type, self::$providers)) {
            return self::$providers[$this->type]['name'];
        }
    }
}
