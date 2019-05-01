<?php

namespace App\Jobs\Slide;

use App\Jobs\Job;
use App\Contracts\Repositories\SlideRepository;
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
    public function handle(SlideRepository $repository)
    {
        if (!empty($this->item->image_src)) {
            $this->deleteSource($this->item->image_src);
        }

        return $repository->delete($this->item);
    }
}
