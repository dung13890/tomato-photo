<?php

namespace App\Jobs\Product;

use App\Jobs\Job;
use App\Contracts\Repositories\ProductRepository;
use App\Traits\UploadableTrait;

class UpdateJob extends Job
{
    use UploadableTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $item;
    protected $params;

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
    public function handle(ProductRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());
        $data['locked'] = $data['locked'] ?? false;

        if (array_has($this->params, 'image_before_src')) {
            if (!empty($this->item->image_before_src)) {
                $this->deleteSource($this->item->image_before_src);
            }
            $imageBefore = $this->uploadFile($this->params['image_before_src']);
            $data['image_before_src'] = $imageBefore->src;
            $data['image_before_title'] = $imageBefore->title;
        }

        if (array_has($this->params, 'image_after_src')) {
            if (!empty($this->item->image_after_src)) {
                $this->deleteSource($this->item->image_after_src);
            }
            $imageAfter = $this->uploadFile($this->params['image_after_src']);
            $data['image_after_src'] = $imageAfter->src;
            $data['image_after_title'] = $imageAfter->title;
        }

        $repository->update($this->item, $data);
    }
}
