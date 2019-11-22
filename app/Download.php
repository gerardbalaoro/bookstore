<?php

namespace App;

use Calibre\Model;
use App\Traits\OptimusRoute;

class Download extends Model
{
    use OptimusRoute;

    public $table = 'data';
    
    public $appends = ['path'];

    public function volume()
    {
        return $this->belongsTo(Book::class, 'book');
    }

    public function getPathAttribute()
    {
        return $this->name.'.'.strtolower($this->format);
    }
}
