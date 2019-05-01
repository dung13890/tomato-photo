<?php

namespace App\Contracts\Repositories;

interface PostRepository
{
    public function findBySlug($slug);

    public function scopeDatatables($columns = ['*'], $with = []);
}
