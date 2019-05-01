<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'image_title',
        'image_src',
        'sort',
        'category_id',
    ];

    protected $appends = ['pub_image'];

    public function getPubImageAttribute()
    {
        return publicSrc($this->image_src);
    }
}
