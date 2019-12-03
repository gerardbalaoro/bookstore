<?php

namespace App\Calibre;

class Model extends \Illuminate\Database\Eloquent\Model
{
    protected $connection = 'calibre';

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;
}
