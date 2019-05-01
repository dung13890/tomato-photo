<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SummerNote\UploadJob;
use App\Contracts\Repositories\ContactRepository;
use App\Jobs\Contact\IndexJob;
use App\Jobs\Contact\UpdateJob;
use App\Jobs\Contact\StoreJob;
use App\Jobs\Category\UploadCollectionJob;
use App\Jobs\Category\DeleteCollectionJob;
use App\Http\Requests\Backend\ContactRequest;

class HomeController extends BackendController
{
    protected $imageRules = [
        'image' => 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
    ];
    public function __construct(ContactRepository $contact)
    {
        parent::__construct($contact);
        $this->repositoryName = 'home';
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

    public function store(ContactRequest $request)
    {
        $data = $request->all();

        return $this->doRequest(function () use ($data) {
            return $this->dispatchNow(new StoreJob($data));
        }, __FUNCTION__);
    }

    public function edit($item)
    {
        parent::__edit($item);

        return $this->viewRender();
    }

    public function update(ContactRequest $request, $item)
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

    public function summernoteImage(Request $request)
    {
        $request->validate(
            $this->imageRules,
            [],
            ['image' => __('repositories.label.image')]
        );

        $image =  $this->dispatchNow(new UploadJob($request->image));
        return [
            'url' => publicSrc($image->src),
        ];
    }

    public function storeCollection(Request $request, $category)
    {
        $request->validate(
            $this->imageRules,
            [],
            ['image' => __('repositories.label.image')]
        );

        $image = $request->image;

        return $this->dispatchNow(new UploadCollectionJob($image, $category));
    }

    public function deleteCollection($id)
    {
        return $this->doRequest(function () use ($id) {
            return $this->dispatchNow(new DeleteCollectionJob($id));
        }, 'destroy');
    }
}
