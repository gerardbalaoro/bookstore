<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\OptimusRoute;

class Publisher extends Model
{
    use OptimusRoute;

    public function books()
    {
        return $this->belongsToMany('App\Book', 'books_publishers_link', 'publisher', 'book');
    }

    public function getUrlAttribute()
    {
        return route('publisher.show', [$this, str_slug($this->name)]);
    }
}
