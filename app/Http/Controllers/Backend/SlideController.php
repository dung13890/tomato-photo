<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\SlideRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Http\Requests\Backend\SlideRequest;
use App\Jobs\Slide\IndexJob;
use App\Jobs\Slide\StoreJob;
use App\Jobs\Slide\UpdateJob;
use App\Jobs\Slide\DestroyJob;

class SlideController extends BackendController
{
    protected $repoCategory;

    protected $categorySelect = ['id', 'name'];

    public function __construct(SlideRepository $slide, CategoryRepository $category)
    {
        parent::__construct($slide);
        $this->repoCategory = $category;
    }

    public function index(Request $request)
    {
        parent::__index();
        $this->compacts['categories'] = $this->repoCategory
            ->getDataByType(config('common.category.type.0'), $this->categorySelect)
            ->pluck('name', 'id')
            ->prepend(__('repositories.page.about'), -1)
            ->prepend(__('repositories.label.is_home'), 0);

        if ($request->ajax() && $request->has('datatables')) {
            $params = $request->all();

            return $this->dispatchNow(new IndexJob($params));
        }
        return $this->viewRender();
    }

    public function create()
    {
        parent::__create();
        $this->compacts['categories'] = $this->repoCategory
            ->getDataByType(config('common.category.type.0'), $this->categorySelect)
            ->pluck('name', 'id')
            ->prepend(__('repositories.page.about'), -1)
            ->prepend(__('repositories.label.is_home'), 0);

        return $this->viewRender();
    }

    public function store(SlideRequest $request)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            $this->dispatchNow(new StoreJob($data));
        }, __FUNCTION__);
    }

    public function edit($item)
    {
        parent::__edit($item);
        $this->compacts['categories'] = $this->repoCategory
            ->getDataByType(config('common.category.type.0'), $this->categorySelect)
            ->pluck('name', 'id')
            ->prepend(__('repositories.page.about'), -1)
            ->prepend(__('repositories.label.is_home'), 0);

        return $this->viewRender();
    }

    public function update(SlideRequest $request, $item)
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
