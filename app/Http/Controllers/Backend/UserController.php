<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\UserRepository;
use App\Jobs\User\IndexJob;
use App\Jobs\User\StoreJob;
use App\Jobs\User\UpdateJob;
use App\Http\Requests\Backend\UserRequest;

class UserController extends BackendController
{
    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }

    public function index(Request $request)
    {
        parent::__index();
        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();

            return $this->dispatchNow(new IndexJob($params));
        }
        return $this->viewRender();
    }

    public function create()
    {
        parent::__create();

        return $this->viewRender();
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            $this->dispatchNow(new StoreJob($data));
        }, __FUNCTION__);
    }

    public function edit($item)
    {
        parent::__edit($item);

        return $this->viewRender();
    }

    public function update(UserRequest $request, $item)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatchNow(new UpdateJob($data, $item));
        }, __FUNCTION__);
    }

    public function destroy($item)
    {
        return $this->doRequest(function () use ($item) {
            return $this->repository->delete($item);
        }, __FUNCTION__);
    }
}
