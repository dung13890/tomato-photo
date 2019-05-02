<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\SlideRepository;
use App\Contracts\Repositories\ContactRepository;
use App\Contracts\Repositories\ProductRepository;
use App\Http\Requests\Frontend\ContactRequest;
use App\Jobs\Contact\UserStoreJob;

class HomeController extends FrontendController
{
    protected $repoSlide;
    protected $repoContact;
    protected $repoProduct;

    public function __construct(
        SlideRepository $slide,
        ContactRepository $contact,
        ProductRepository $product
    ) {
        parent::__construct();
        $this->repoSlide = $slide;
        $this->repoContact = $contact;
        $this->repoProduct = $product;
    }
    public function index(Request $request)
    {
        $this->view = 'home.index';
        $this->compacts['slides'] = $this->repoSlide->getDataByCategory(
            config('common.slide.limit'),
            0,
            ['title', 'description', 'image_src']
        );
        $this->compacts['testimonials'] = $this->repoContact->getTestimonials(
            config('common.contact.limit'),
            ['first_name', 'last_name', 'company', 'avatar', 'message']
        );

        $this->compacts['products'] = $this->repoProduct->getHome(
            config('common.product.limit'),
            ['id', 'name', 'image_src', 'image_title', 'intro', 'price', 'category_id']
        );

        return $this->viewRender();
    }

    public function storeContact(ContactRequest $request)
    {
        $data = $request->all();

        try {
            $message = __("repositories.frontend.contact_form.successfully");
            $this->dispatchNow(new UserStoreJob($data));
        } catch (\Exception $e) {
            $message = __("repositories.frontend.contact_form.unsuccessfully");
        }

        return redirect(url()->previous())->with('contact_flash_message', $message);
    }
}
