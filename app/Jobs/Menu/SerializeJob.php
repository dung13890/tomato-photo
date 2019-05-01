<?php

namespace App\Jobs\Menu;

use App\Jobs\Job;
use App\Contracts\Repositories\MenuRepository;

class SerializeJob extends Job
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
        $this->recursive($repository, json_decode($this->params['serialize']));
        \Cache::forget('__menus');
    }

    public function recursive(MenuRepository $repository, array $data, $parent = 0, $order = 0)
    {
        foreach ($data as $value) {
            $order++;
            if (isset($value->children)) {
                $this->recursive($repository, $value->children, $value->id, $orderChildren = 0);
            }
            $repository->findOrFail($value->id)->update([
                'sort' => $order,
                'parent_id' => $parent
            ]);
        }
    }
}
