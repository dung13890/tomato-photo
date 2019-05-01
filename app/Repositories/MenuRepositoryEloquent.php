<?php

namespace App\Repositories;

use App\Contracts\Repositories\MenuRepository;
use App\Eloquent\Menu;

class MenuRepositoryEloquent extends AbstractRepositoryEloquent implements MenuRepository
{
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
    }

    public function getData($columns = ['*'])
    {
        return $this->model
            ->where('parent_id', 0)
            ->with(['children' => function ($q) use ($columns) {
                $q->select($columns);
            }])
            ->orderBy('sort')
            ->get($columns);
    }
}
