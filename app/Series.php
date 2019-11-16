<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\OptimusRoute;

class Series extends Model
{
    use OptimusRoute;

    public $table = 'series';

    public function books()
    {
        return $this->belongsToMany('App\Book', 'books_series_link', 'series', 'book');
    }

    public function getUrlAttribute()
    {
        return route('series.show', [$this, str_slug($this->name)]);
    }
}