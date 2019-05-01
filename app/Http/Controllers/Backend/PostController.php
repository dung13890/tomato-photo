<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Jobs\Post\IndexJob;
use App\Jobs\Post\StoreJob;
use App\Jobs\Post\UpdateJob;
use App\Jobs\Post\DestroyJob;
use App\Contracts\Repositories\PostRepository;
use App\Http\Requests\Backend\PostRequest;

class PostController extends BackendController
{
    public function __construct(PostRepository $post)
    {
        parent::__construct($post);
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

    public function store(PostRequest $request)
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

    public function update(PostRequest $request, $item)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatchNow(new UpdateJob($data, $item));
        }, __FUNCTION__);
    }

    public function destroy($item)
    {
        return $this->doRequest(function () use ($item) {
            return $this->dispatchNow(new DestroyJob($item));
        }, __FUNCTION__);
    }
}
