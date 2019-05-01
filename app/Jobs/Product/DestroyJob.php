<?php

namespace App\Jobs\Product;

use App\Jobs\Job;
use App\Contracts\Repositories\ProductRepository;
use App\Traits\UploadableTrait;

class DestroyJob extends Job
{
    use UploadableTrait;

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
    public function handle(ProductRepository $repository)
    {
        if (!empty($this->item->image_src)) {
            $this->deleteSource($this->item->image_src);
        }

        return $repository->delete($this->item);
    }
}
