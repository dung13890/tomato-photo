<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image_src',
        'image_title',
        'image_ba_src',
        'image_ba_title',
        'description',
        'intro',
        'sort',
        'price',
        'is_home',
        'locked',
        'category_id',
    ];

    public function scopeByKeywords($query, $keywords)
    {
        return $query->where('name', 'LIKE', "{$keywords}%")
            ->orwhere('description', 'LIKE', "{$keywords}%")
            ->orwhere('intro', 'LIKE', "{$keywords}%")
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
