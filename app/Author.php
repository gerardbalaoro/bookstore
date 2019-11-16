<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\OptimusRoute;

class Author extends Model
{
    use OptimusRoute;

    public function books()
    {
        return $this->belongsToMany('App\Book', 'books_authors_link', 'author', 'book');
    }

    public function getUrlAttribute()
    {
        return route('author.show', [$this, str_slug($this->name)]);
    }
}
