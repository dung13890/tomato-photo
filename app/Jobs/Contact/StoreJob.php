<?php

namespace App\Jobs\Contact;

use App\Jobs\Job;
use App\Contracts\Repositories\ContactRepository;
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
    public function handle(ContactRepository $repository)
    {
        $data = array_only($this->params, $repository->model->getFillable());
        $data['is_home'] = $data['is_home'] ?? false;
        $data['is_team'] = $data['is_team'] ?? false;
        if (array_has($this->params, 'image')) {
            $image = $this->uploadFile($this->params['image']);
            $data['avatar'] = $image->src;
        }

        $repository->create($data);
    }
}
