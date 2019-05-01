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
        $data['is_home'] = $data['is_home'] ?? false;

        $image = $this->uploadFile($this->params['image']);
        $data['image_src'] = $image->src;
        $data['image_title'] = $image->title;

        $repository->create($data);
    }
}
