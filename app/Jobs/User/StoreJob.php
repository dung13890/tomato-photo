<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Contracts\Repositories\UserRepository;

class StoreJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $params;

    public function __construct(array $params)
    {
        parent::__construct();
        $this->params = $params;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());

        $repository->create($data);
    }
}
