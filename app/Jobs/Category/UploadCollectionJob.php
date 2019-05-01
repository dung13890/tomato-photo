<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Contracts\Repositories\CollectionRepository;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadableTrait;

class UploadCollectionJob extends Job
{
    use UploadableTrait;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $image;
    protected $category;

    public function __construct(UploadedFile $image, $category)
    {
        parent::__construct();
        $this->image = $image;
        $this->category = $category;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CollectionRepository $repository)
    {
        $maxSort = $repository->getMaxSort($this->category->id);
        $image = $this->uploadFile($this->image);
        $data['image_src'] = $image->src;
        $data['image_title'] = $image->title;
        $data['category_id'] = $this->category->id;
        $data['sort'] = $maxSort + 1;

        return $repository->create($data);
    }
}
