<?php

namespace App\Jobs\Pricing;

use App\Jobs\Job;
use App\Contracts\Repositories\PricingRepository;
use App\Contracts\Repositories\ConfigRepository;

class StoreJob extends Job
{
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
    public function handle(PricingRepository $repository)
    {
        $params = $this->params['params'] ?? [];

        foreach ($params as $key => $value) {
            $item = $repository->findOrFail($key);
            $data = array_only($value, $repository->model->getFillable());

            $repository->update($item, $data);
        }

        $this->updateConfig('pricing_header');
        $this->updateConfig('pricing_title');
        \Cache::forget('configs');
    }

    protected function updateConfig($key)
    {
        $value = $this->params[$key] ?? null;
        $item = app(ConfigRepository::class)->findByKey($key);
        if ($item) {
            app(ConfigRepository::class)->update($item, [
                'value' => [$value],
            ]);
        }
    }
}
