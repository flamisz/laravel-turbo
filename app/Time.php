<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public $timestamps = false;

    protected $casts = [
        'start' => 'datetime',
        'stop' => 'datetime',
    ];

    protected $guarded = [];
}
