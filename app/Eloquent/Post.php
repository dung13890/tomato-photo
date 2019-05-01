<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelableTrait;

class Post extends Model
{
    use ModelableTrait;

    protected $fillable = [
        'ceo_title',
        'ceo_description',
        'ceo_keywords',
        'name',
        'slug',
        'image_src',
        'image_title',
        'description',
        'locked',
    ];

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orWhere('ceo_keywords', 'LIKE', "{$keywords}%")
            ->orWhere('ceo_title', 'LIKE', "{$keywords}%")
            ->orWhere('ceo_title', 'LIKE', "{$keywords}%")
            ->orWhere('description', 'LIKE', "{$keywords}%");
    }
}
