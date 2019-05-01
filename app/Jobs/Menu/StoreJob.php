<?php

namespace App\Jobs\Menu;

use App\Jobs\Job;
use App\Contracts\Repositories\MenuRepository;

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
    public function handle(MenuRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());

        $repository->create($data);

        \Cache::forget('__menus');
    }
}
