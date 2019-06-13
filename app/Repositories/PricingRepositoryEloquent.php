<?php

namespace App\Repositories;

use App\Contracts\Repositories\PricingRepository;
use App\Eloquent\Pricing;

class PricingRepositoryEloquent extends AbstractRepositoryEloquent implements PricingRepository
{
    public function __construct(Pricing $pricing)
    {
        parent::__construct($pricing);
    }

    public function getData($limit, $columns = ['*'])
    {
        return $this->model->limit($limit)->get($columns);
    }
}
