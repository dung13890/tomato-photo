<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Http\Requests\Backend\ProductRequest;
use App\Jobs\Product\IndexJob;
use App\Jobs\Product\StoreJob;
use App\Jobs\Product\UpdateJob;
use App\Jobs\Product\DestroyJob;

class ProductController extends BackendController
{
    protected $repoCategory;

    protected $categorySelect = ['id', 'name'];

    public function __construct(ProductRepository $product, CategoryRepository $category)
    {
        parent::__construct($product);
        $this->repoCategory = $category;
    }

    public function index(Request $request)
    {
        parent::__index();
        $this->compacts['categories'] = $this->repoCategory
            ->getDataByType(config('common.category.type.0'), $this->categorySelect)
            ->pluck('name', 'id')
            ->prepend('---');

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
            ->prepend('---', 0);

        return $this->viewRender();
    }

    public function store(ProductRequest $request)
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
            ->prepend('---', 0);

        return $this->viewRender();
    }

    public function update(ProductRequest $request, $item)
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
