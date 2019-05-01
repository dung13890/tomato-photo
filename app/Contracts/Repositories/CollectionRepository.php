<?php

namespace App\Contracts\Repositories;

interface CollectionRepository
{
    public function getMaxSort($categoryId);

    public function updateMultipleSort($ids);
}
