<?php

namespace App\Jobs\Slide;

use App\Jobs\Job;
use App\Contracts\Repositories\SlideRepository;
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
    public function handle(SlideRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;

        $image = $this->uploadFile($this->params['image']);
        $data['image_src'] = $image->src;
        $data['image_title'] = $image->title;

        $repository->create($data);
    }
}
