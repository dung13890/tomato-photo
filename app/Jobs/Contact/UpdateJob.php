<?php

namespace App\Jobs\Contact;

use App\Jobs\Job;
use App\Contracts\Repositories\ContactRepository;
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
    public function handle(ContactRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());
        $data['is_home'] = $data['is_home'] ?? false;
        $data['is_team'] = $data['is_team'] ?? false;
        if (array_has($this->params, 'image')) {
            if (!empty($this->item->avatar)) {
                $this->deleteSource($this->item->avatar);
            }
            $image = $this->uploadFile($this->params['image']);
            $data['avatar'] = $image->src;
        }

        $repository->update($this->item, $data);
    }
}
