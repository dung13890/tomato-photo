<?php

namespace App\Jobs\Product;

use App\Jobs\Job;
use App\Contracts\Repositories\ProductRepository;
use App\Traits\UploadableTrait;

class StoreJob extends Job
{
    use UploadableTrait;
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
    public function handle(ProductRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;

        $imageBefore = $this->uploadFile($this->params['image_before_src']);
        $data['image_before_src'] = $imageBefore->src;
        $data['image_before_title'] = $imageBefore->title;

        $imageAfter = $this->uploadFile($this->params['image_after_src']);
        $data['image_after_src'] = $imageAfter->src;
        $data['image_after_title'] = $imageAfter->title;

        $repository->create($data);
    }
}
