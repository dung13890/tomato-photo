<?php

namespace App\Contracts\Repositories;

interface SlideRepository
{
    public function scopeDatatables($columns = ['*'], $with = []);

    public function getDataByCategory($limit, $categoryId, $columns = ['*']);
}
