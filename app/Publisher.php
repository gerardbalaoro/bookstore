<?php

namespace App;

use Calibre\Model;
use App\Traits\OptimusRoute;

class Publisher extends Model
{
    use OptimusRoute;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_publishers_link', 'publisher', 'book');
    }

    public function getUrlAttribute()
    {
        return route('publisher.show', [$this, str_slug($this->name)]);
    }
}
