<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Contracts\Repositories\CategoryRepository;
use App\Traits\UploadableTrait;

class DestroyJob extends Job
{
    use UploadableTrait;
    /**
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
        if (!empty($this->item->image_src)) {
            $this->deleteSource($this->item->image_src);
        }

        return $repository->delete($this->item);
    }
}
