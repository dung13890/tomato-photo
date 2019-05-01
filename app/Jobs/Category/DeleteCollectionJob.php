<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Contracts\Repositories\CollectionRepository;
use App\Traits\UploadableTrait;

class DeleteCollectionJob extends Job
{
    use UploadableTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CollectionRepository $repository)
    {
        $item = $repository->find($this->id);
        if (!empty($item->image_src)) {
            $this->deleteSource($item->image_src);
        }

        $repository->delete($item);
    }
}
