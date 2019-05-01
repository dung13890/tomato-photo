<?php

namespace App\Contracts\Repositories;

interface UserRepository
{
    public function scopeDatatables($columns = ['*'], $with = []);
}
