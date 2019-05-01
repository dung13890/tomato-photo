<?php

namespace App\Repositories;

use App\Contracts\Repositories\SlideRepository;
use App\Eloquent\Slide;

class SlideRepositoryEloquent extends AbstractRepositoryEloquent implements SlideRepository
{
    public function __construct(Slide $slide)
    {
        parent::__construct($slide);
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
            ->orderByDesc('updated_at')
            ->take($limit)
            ->get($columns);
    }
}
