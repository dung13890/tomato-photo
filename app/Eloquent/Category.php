<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelableTrait;

class Category extends Model
{
    use ModelableTrait;

    protected $fillable = [
        'name',
        'image_src',
        'ceo_title',
        'ceo_description',
        'ceo_keywords',
        'type',
        'description',
        'collection_title',
        'collection_intro',
        'locked',
    ];

    public function products()
    {
        return $this->hasMany(Product::class)
            ->select([
                'id',
                'name',
                'image_before_src',
                'image_after_src',
                'image_before_title',
                'image_after_title',
                'category_id'
            ])
            ->orderBy('sort')
            ->where('locked', false);
    }

    public function slides()
    {
        return $this->hasMany(Slide::class)
            ->select(['id', 'image_src', 'description', 'category_id'])
            ->orderByDesc('updated_at')
            ->where('locked', false);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class)
            ->select(['id', 'image_src', 'sort', 'category_id'])
            ->orderBy('sort');
    }
}
