<?php

namespace App\Repositories;

use App\Contracts\Repositories\CollectionRepository;
use App\Eloquent\Collection;
use DB;

class CollectionRepositoryEloquent extends AbstractRepositoryEloquent implements CollectionRepository
{
    public function __construct(Collection $collection)
    {
        parent::__construct($collection);
    }

    public function getMaxSort($categoryId)
    {
        return $this->model->where('category_id', $categoryId)->max('sort');
    }

    public function updateMultipleSort($collectionIds)
    {
        $table = $this->model->getTable();
        $cases = [];
        $ids = [];
        $params = [];

        foreach ($collectionIds as $index => $id) {
            $cases[] = "WHEN {$id} then ?";
            $params[] = $index + 1;
            $ids[] = $id;
        }
        $ids = implode(',', $ids);
        $cases = implode(' ', $cases);

        return DB::update("UPDATE `{$table}` SET `sort` = CASE `id` {$cases} END
            WHERE `id` in ({$ids})", $params);
    }
}
