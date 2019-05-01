<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductRepository;
use App\Eloquent\Product;

class ProductRepositoryEloquent extends AbstractRepositoryEloquent implements ProductRepository
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function scopeDatatables($columns = ['*'], $with = [])
    {
        return $this->model
            ->select($columns)
            ->with($with);
    }

    public function getDataByCategory($limit, $categoryId, $columns = ['*'])
    {
        return $this->model
            ->where('locked', false)
            ->where('category_id', $categoryId)
            ->orderBy('sort')
            ->take($limit)
            ->get($columns);
    }

    public function getHome($limit, $columns = ['*'])
    {
        return $this->model
            ->where('locked', false)
            ->where('is_home', true)
            ->with(['category' => function ($q) {
                $q->select(['id', 'slug']);
            }])
            ->orderBy('sort')
            ->take($limit)
            ->get($columns);
    }
}
