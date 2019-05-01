<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'key', 'value'
    ];

    protected $casts = [
        'value' => 'array',
    ];
}
