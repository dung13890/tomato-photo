<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Contracts\Repositories\CategoryRepository;

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
    public function handle(CategoryRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;
        $repository->create($data);
    }
}
