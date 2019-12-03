<?php

namespace App\Traits;

use Illuminate\Support\Arr;

trait Linkable
{
    protected static $providers = [
        'uri' => [
            'name' => 'Website',
            'url' => '{id}'
        ],
        'amazon' => [
            'name' => 'Amazon',
            'url' => 'https://www.amazon.com/dp/{id}',
        ],
        'apple' => [
            'name' => 'Apple Books',
            'url' => 'https://books.apple.com/book/{id}',
        ],
        'mobi-asin' => [
            'name' => 'Kindle',
            'url' => 'https://www.amazon.com/dp/{id}',
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
            if ($this->type === 'uri') {
                $name = Arr::get(parse_url($this->val), 'host', 'Website');
                return $name;
            }
            
            return self::$providers[$this->type]['name'];
        }
    }

    public function getLinkableAttribute()
    {
        return array_key_exists($this->type, self::$providers);
    }
}
