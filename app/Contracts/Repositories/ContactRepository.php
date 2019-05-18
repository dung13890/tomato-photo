<?php

namespace App\Contracts\Repositories;

interface ContactRepository
{
    public function scopeDatatables($columns = ['*'], $with = []);

    public function getTestimonials($limit, $columns = ['*']);

    public function getTeams($limit, $columns = ['*']);
}
