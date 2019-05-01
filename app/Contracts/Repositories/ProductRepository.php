<?php

namespace App\Contracts\Repositories;

interface ProductRepository
{
    public function scopeDatatables($columns = ['*'], $with = []);

    public function getDataByCategory($limit, $categoryId, $columns = ['*']);

    public function getHome($limit, $columns = ['*']);
}
