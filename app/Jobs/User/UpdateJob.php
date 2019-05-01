<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Contracts\Repositories\UserRepository;

class UpdateJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $item;
    protected $params;

    public function __construct(array $params, $item)
    {
        parent::__construct();
        $this->params = $params;
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepository $repository)
    {
        if (empty($this->params['password'])) {
            unset($this->params['password']);
        }
        $data = array_only($this->params, $repository->model->getFillable());

        $repository->update($this->item, $data);
    }
}
