<?php

namespace App;

use App\Calibre\Model;
use App\Traits\Linkable;

class Identifier extends Model
{
    use Linkable;

    protected $appends = [
        'url', 'name'
    ];
    
    public function book()
    {
        return $this->belongsTo(Book::class, 'book');
    }
}
