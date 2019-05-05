<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\ProductRepository;

class CategoryController extends FrontendController
{
    protected $repoProduct;

    public function __construct(
        CategoryRepository $category,
        ProductRepository $product
    ) {
        parent::__construct($category);
        $this->repoProduct = $product;
    }

    public function show($slug)
    {
        $categories = $this->repository->getDataByType('product');
        if ($slug == 'services' && count($categories)) {
            $slug = $categories[0]->slug;
        }
        $category = $this->repository->findBySlugOrFail($slug);
        $this->view = 'category.show';
        // SEO
        $this->compacts['heading'] = $category->ceo_title ?? $category->name;
        $this->compacts['description'] = $category->ceo_description;
        $this->compacts['keywords'] = $category->ceo_keywords;

        $this->compacts['category'] = $category;
        $this->compacts['categories'] = $categories;
        $this->compacts['slides'] = $category->slides;
        $this->compacts['services'] = $this->repoProduct->getHome(
            config('common.product.limit'),
            ['id', 'name', 'image_before_src', 'image_before_title', 'image_after_src', 'image_after_title', 'description', 'category_id']
        );
        // $this->compacts['collections'] = $category->collections;

        return $this->viewRender();
    }
}
