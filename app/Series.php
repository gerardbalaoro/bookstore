<?php

namespace App;

use App\Calibre\Model;
use App\Traits\OptimusRoute;

class Series extends Model
{
    use OptimusRoute;

    public $table = 'series';

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_series_link', 'series', 'book');
    }

    public function getUrlAttribute()
    {
        return route('series.show', [$this, str_slug($this->name)]);
    }
}
