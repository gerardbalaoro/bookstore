<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\OptimusRoute;

class Download extends Model
{
    use OptimusRoute;

    public $table = 'data';
    
    public $appends = ['path'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book');
    }

    public function getPathAttribute()
    {
        return $this->name.'.'.strtolower($this->format);
    }
}