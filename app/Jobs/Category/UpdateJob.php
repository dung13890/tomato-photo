<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Contracts\Repositories\CategoryRepository;
use App\Traits\UploadableTrait;

class UpdateJob extends Job
{
    use UploadableTrait;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $params;
    protected $item;

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
    public function handle(CategoryRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;
        if (array_has($this->params, 'image')) {
            if (!empty($this->item->image_src)) {
                $this->deleteSource($this->item->image_src);
            }
            $image = $this->uploadFile($this->params['image']);
            $data['image_src'] = $image->src;
            $data['image_title'] = $image->title;
        }

        $repository->update($this->item, $data);
    }
}
