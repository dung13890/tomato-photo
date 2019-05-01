<?php

namespace App\Contracts\Repositories;

interface CategoryRepository
{
    public function getDataByType($type, $columns = ['*']);

    public function getRandom($limit, $columns = ['*']);
}
