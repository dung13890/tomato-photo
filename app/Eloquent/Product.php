<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image_before_src',
        'image_after_src',
        'image_before_title',
        'image_after_title',
        'description',
        'sort',
        'locked',
        'category_id',
    ];

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orwhere('description', 'LIKE', "{$keywords}%")
            ->orWhere('image_before_title', 'LIKE', "{$keywords}%")
            ->orWhere('image_after_title', 'LIKE', "{$keywords}%");
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
