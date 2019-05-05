<?php

namespace App\Jobs\Config;

use App\Jobs\Job;
use App\Contracts\Repositories\ConfigRepository;
use App\Traits\UploadableTrait;

class UpdateJob extends Job
{
    use UploadableTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $dataSelect = [
        'key',
        'value',
    ];
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
    public function handle(ConfigRepository $repository)
    {
        $items = $repository->getData($this->dataSelect);
        $data = $this->params;
        unset($data['_token']);
        if (!empty($this->params['logo'])) {
            $logo = $this->uploadFile($this->params['logo'][0]);
            $data['logo'] = [$logo->src];
        }

        if (!empty($this->params['home']['who_we_are_image'])) {
            $homeWhoWeAreImage = $this->uploadFile($this->params['home']['who_we_are_image']);
            $data['home']['who_we_are_image'] = $homeWhoWeAreImage->src;
        } else {
            $data['home']['who_we_are_image'] = $items->keyBy('key')['home']['value']['who_we_are_image'] ?? null;
        }

        if (!empty($this->params['about']['banner'])) {
            $aboutBanner = $this->uploadFile($this->params['about']['banner']);
            $data['about']['banner'] = $aboutBanner->src;
        } else {
            $data['about']['banner'] = $items->keyBy('key')['about']['value']['banner'] ?? null;
        }

        if (!empty($this->params['blog']['banner'])) {
            $blogBanner = $this->uploadFile($this->params['blog']['banner']);
            $data['blog']['banner'] = $blogBanner->src;
        } else {
            $data['blog']['banner'] = $items->keyBy('key')['blog']['value']['banner'] ?? null;
        }

        if (!empty($this->params['contact']['banner'])) {
            $contactBanner = $this->uploadFile($this->params['contact']['banner']);
            $data['contact']['banner'] = $contactBanner->src;
        } else {
            $data['contact']['banner'] = $items->keyBy('key')['contact']['value']['banner'] ?? null;
        }

        if (!empty($this->params['contact']['banner_1'])) {
            $contactBanner1 = $this->uploadFile($this->params['contact']['banner_1']);
            $data['contact']['banner_1'] = $contactBanner1->src;
        } else {
            $data['contact']['banner_1'] = $items->keyBy('key')['contact']['value']['banner_1'] ?? null;
        }

        if (!empty($this->params['contact']['banner_2'])) {
            $contactBanner2 = $this->uploadFile($this->params['contact']['banner_2']);
            $data['contact']['banner_2'] = $contactBanner2->src;
        } else {
            $data['contact']['banner_2'] = $items->keyBy('key')['contact']['value']['banner_2'] ?? null;
        }

        foreach ($data as $key => $value) {
            $item = $repository->findByKey($key);
            if ($item) {
                $repository->update($item, [
                    'value' => $value,
                ]);
            }
        }

        \Cache::forget('configs');
        \Cache::forget('__categories');
    }
}
