<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\CollectionRepository;

class CollectionJob extends Job
{
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
    public function handle(CategoryRepository $repository, CollectionRepository $collectionRepo)
    {
        $data = array_only($this->params, ['collection_title', 'collection_intro']);

        if (!empty($this->params['image_ids'])) {
            $this->item->collections()->whereNotIn('id', $this->params['image_ids'])->delete();
            $collectionRepo->updateMultipleSort($this->params['image_ids']);
        }
        $repository->update($this->item, $data);
    }
}
