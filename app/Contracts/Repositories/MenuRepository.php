<?php

namespace App\Contracts\Repositories;

interface MenuRepository
{
    public function getData($columns = ['*']);
}
