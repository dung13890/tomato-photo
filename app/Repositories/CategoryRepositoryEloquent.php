<?php

namespace App\Repositories;

use App\Contracts\Repositories\CategoryRepository;
use App\Eloquent\Category;

class CategoryRepositoryEloquent extends AbstractRepositoryEloquent implements CategoryRepository
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function getDataByType($type, $columns = ['*'], $all = false)
    {
        return $this->model
        ->where('type', $type)
        ->where(function ($q) use ($all) {
            if (!$all) {
                return $q->where('locked', false);
            }
        })
        ->get($columns);
    }

    public function getRandom($limit, $columns = ['*'])
    {
        return $this->model
            ->inRandomOrder()
            ->where('locked', false)
            ->take($limit)
            ->get($columns);
    }
}
