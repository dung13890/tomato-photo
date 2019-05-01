<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'description',
        'image_src',
        'image_title',
        'locked',
        'category_id',
    ];

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('description', 'LIKE', "{$keywords}%")
            ->orWhere('image_title', 'LIKE', "{$keywords}%");
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
