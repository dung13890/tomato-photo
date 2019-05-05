<?php

namespace App\Jobs\Slide;

use App\Jobs\Job;
use Yajra\DataTables\Facades\DataTables;
use App\Contracts\Repositories\SlideRepository;
use App\Traits\DatatableTrait;

class IndexJob extends Job
{
    use DatatableTrait;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $params;

    protected $dataSelect = [
        'id',
        'title',
        'description',
        'image_src',
        'image_title',
        'locked',
        'category_id',
    ];

    public function __construct(array $params)
    {
        parent::__construct();
        $this->params = $params;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SlideRepository $repository)
    {
        $datatables = DataTables::of($repository
            ->scopeDatatables($this->dataSelect, ['category']));

        $this->filterDatatable($datatables, $this->params, function ($query, $params) {
            $categoryId = $params['category_id'] ?? 0;
            return $query->byCategory($categoryId);
        });
        $this->columnDatatable($datatables, $repository->model);
        $datatables->addColumn('category', function ($item) {
            return !$item->category_id ? __('repositories.label.is_home') : $item->category_id === -1 ? __('repositories.page.about') : $item->category->name;
        })->editColumn('image_src', function ($item) {
            return publicSrc($item->image_src);
        });

        return $datatables->make(true);
    }
}
