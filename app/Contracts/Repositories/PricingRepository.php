<?php

namespace App\Contracts\Repositories;

interface PricingRepository
{
    public function getData($limit, $columns = ['*']);
}
