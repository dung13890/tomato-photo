<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PricingRepository;
use App\Contracts\Repositories\ConfigRepository;
use App\Http\Requests\Backend\PricingRequest;
use App\Jobs\Pricing\StoreJob;

class PricingController extends BackendController
{

    protected $configRepo;

    public function __construct(PricingRepository $pricing, ConfigRepository $config)
    {
        parent::__construct($pricing);
        $this->configRepo = $config;
    }

    public function index()
    {
        parent::__index();
        $this->compacts['pricingHeader'] = $this->configRepo->findByKey('pricing_header')->value[0] ?? null;
        $this->compacts['pricingTitle'] = $this->configRepo->findByKey('pricing_title')->value[0] ?? null;
        $this->compacts['pricings'] = $this->repository->getData(config('common.pricing.limit'));

        return $this->viewRender();
    }

    public function store(PricingRequest $request)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            return $this->dispatchNow(new StoreJob($data));
        }, __FUNCTION__, false, url()->previous());
    }
}
