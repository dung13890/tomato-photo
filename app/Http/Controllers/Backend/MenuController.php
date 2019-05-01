<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\MenuRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Http\Requests\Backend\MenuRequest;
use App\Jobs\Menu\StoreJob;
use App\Jobs\Menu\UpdateJob;
use App\Jobs\Menu\SerializeJob;

class MenuController extends BackendController
{
    protected $repoCategory;
    protected $categorySelect = ['name', 'slug'];

    public function __construct(MenuRepository $menu, CategoryRepository $category)
    {
        parent::__construct($menu);
        $this->repoCategory = $category;
    }

    public function index()
    {
        parent::__index();
        $this->compacts['items'] = $this->repository->getData();
        $this->compacts['categories'] = $this->repoCategory
            ->getDataByType(config('common.category.type.0'), $this->categorySelect)
            ->mapWithKeys(function ($item) {
                $url = parse_url(route('category.show', $item['slug']), PHP_URL_PATH);
                return [$url => $item['name']];
            })
            ->prepend('---', '#');

        return $this->viewRender();
    }

    public function store(MenuRequest $request)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            return $this->dispatchNow(new StoreJob($data));
        }, __FUNCTION__, false, url()->previous());
    }

    public function edit($item)
    {
        parent::__edit($item);

        return $this->index();
    }

    public function update(MenuRequest $request, $item)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data, $item) {
            return $this->dispatchNow(new UpdateJob($data, $item));
        }, __FUNCTION__, false, url()->previous());
    }

    public function destroy($item)
    {
        return $this->doRequest(function () use ($item) {
            if ($item->locked) {
                throw new \Exception();
            }
            $status = $this->repository->delete($item);
            if (!$status) {
                throw new \Exception();
            }
        }, __FUNCTION__);
    }

    public function serialize(Request $request)
    {
        $data = $request->only('serialize');

        return $this->doRequest(function () use ($data) {
            return $this->dispatchNow(new SerializeJob($data));
        }, __FUNCTION__);
    }
}
