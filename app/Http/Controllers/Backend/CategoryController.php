<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\ProductRepository;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Requests\Backend\CollectionRequest;
use App\Jobs\Category\StoreJob;
use App\Jobs\Category\UpdateJob;
use App\Jobs\Category\DestroyJob;
use App\Jobs\Category\CollectionJob;

class CategoryController extends BackendController
{
    protected $repoProduct;
    protected $selectData = [
        'id',
        'name',
        'description',
        'type',
        'locked',
    ];
    public function __construct(CategoryRepository $category, ProductRepository $product)
    {
        parent::__construct($category);
        $this->repoProduct = $product;
    }

    protected function indexRender($type, $action = 'create')
    {
        if (!in_array($type, config('common.category.type'))) {
            abort(403);
        }
        $this->view = sprintf('%s.index', $this->repositoryName);
        $this->compacts['heading'] = sprintf(
            '%s %s',
            __('repositories.title.category'),
            __("repositories.title.{$type}")
        );
        $this->compacts['action'] = __("repositories.title.{$action}");
        $this->compacts['items'] = $this->repository->getDataByType($type, $this->selectData, true);

        return $this->viewRender();
    }

    public function type($type)
    {
        $this->compacts['type'] = $type;

        return $this->indexRender($type);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            return $this->dispatchNow(new StoreJob($data));
        }, __FUNCTION__, false, url()->previous());
    }

    public function edit($item)
    {
        parent::__edit($item);
        $this->compacts['type'] = $this->compacts['item']->type;

        return $this->indexRender($this->compacts['item']->type, 'edit');
    }

    public function update(CategoryRequest $request, $item)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatchNow(new UpdateJob($data, $item));
        }, __FUNCTION__, false, url()->previous());
    }

    public function destroy($item)
    {
        return $this->doRequest(function () use ($item) {
            $status = $this->dispatchNow(new DestroyJob($item));
            if (!$status) {
                throw new \Exception();
            }
        }, __FUNCTION__);
    }

    public function collection($item)
    {
        $this->view = sprintf('%s.collection', $this->repositoryName);
        $this->compacts['item'] = $item;
        $this->compacts['heading'] = sprintf('%s - %s', __('repositories.title.collection'), $item->name);
        $this->compacts['slides'] = $item->slides;
        $this->compacts['products'] = $this->repoProduct->getHome(
            config('common.product.limit'),
            ['id', 'name', 'image_src', 'image_title', 'intro', 'price', 'category_id']
        );;
        $this->compacts['collections'] = $item->collections;

        return $this->viewRender();
    }

    public function updateCollection(CollectionRequest $request, $item)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatchNow(new CollectionJob($data, $item));
        }, 'update', false, route('backend.category.type', 'product'));
    }
}
