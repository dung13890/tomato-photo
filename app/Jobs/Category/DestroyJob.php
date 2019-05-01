<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Contracts\Repositories\CategoryRepository;

class DestroyJob extends Job
{    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $item;

    public function __construct($item)
    {
        parent::__construct();
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepository $repository)
    {
        $this->item->products()->delete();
        $this->item->slides()->delete();
        $this->item->collections()->delete();

        return $repository->delete($this->item);
    }
}
