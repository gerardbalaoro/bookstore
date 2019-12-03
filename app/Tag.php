<?php

namespace App;

use App\Traits\OptimusRoute;
use App\Calibre\Model;

class Tag extends Model
{
    use OptimusRoute;
    
    public function books()
    {
        return $this->belongsToMany('App\Book', 'books_tags_link', 'tag', 'book');
    }
}
