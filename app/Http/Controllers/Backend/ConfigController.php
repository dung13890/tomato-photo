<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Jobs\Config\StoreJob;
use App\Contracts\Repositories\ConfigRepository;
use App\Http\Requests\Backend\ConfigRequest;
use App\Jobs\Config\UpdateJob;

class ConfigController extends BackendController
{
    protected $dataSelect = ['key', 'value'];

    public function __construct(ConfigRepository $config)
    {
        parent::__construct($config);
    }

    public function index()
    {
        parent::__index();
        $this->compacts['items'] = $this->repository->getData($this->dataSelect);

        return $this->viewRender();
    }

    public function store(ConfigRequest $request)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            return $this->dispatchNow(new UpdateJob($data));
        }, 'update', false, url()->previous());
    }
}
