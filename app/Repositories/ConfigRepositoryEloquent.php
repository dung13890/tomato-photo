<?php

namespace App\Repositories;

use App\Contracts\Repositories\ConfigRepository;
use App\Eloquent\Config;

class ConfigRepositoryEloquent extends AbstractRepositoryEloquent implements ConfigRepository
{
    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    public function getData($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    public function findByKey($key)
    {
        return $this->model->where('key', $key)->first();
    }
}
