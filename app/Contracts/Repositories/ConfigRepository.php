<?php

namespace App\Contracts\Repositories;

interface ConfigRepository
{
    public function getData($columns = ['*']);
    public function findByKey($key);
}
