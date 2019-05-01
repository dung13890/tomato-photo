<?php

namespace App\Jobs\Menu;

use App\Jobs\Job;
use App\Contracts\Repositories\MenuRepository;

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
    public function handle(MenuRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());

        $repository->update($this->item, $data);

        \Cache::forget('__menus');
    }
}
