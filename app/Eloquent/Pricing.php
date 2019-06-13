<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        'icon',
        'title',
        'price',
        'description',
        'link',
    ];
}
