<?php

namespace App\Repositories;

use App\Contracts\Repositories\ContactRepository;
use App\Eloquent\Contact;

class ContactRepositoryEloquent extends AbstractRepositoryEloquent implements ContactRepository
{
    public function __construct(Contact $contact)
    {
        parent::__construct($contact);
    }

    public function scopeDatatables($columns = ['*'], $with = [])
    {
        return $this->model
            ->select($columns)
            ->with($with);
    }

    public function getTestimonials($limit, $columns = ['*'])
    {
        return $this->model
            ->where('is_home', true)
            ->orderByDesc('updated_at')
            ->take($limit)
            ->get($columns);
    }

    public function getTeams($limit, $columns = ['*'])
    {
        return $this->model
            ->where('is_team', true)
            ->orderByDesc('updated_at')
            ->take($limit)
            ->get($columns);
    }
}
