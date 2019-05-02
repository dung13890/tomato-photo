<?php

namespace App\Jobs\Product;

use App\Jobs\Job;
use Yajra\DataTables\Facades\DataTables;
use App\Contracts\Repositories\ProductRepository;
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
        'name',
        'image_before_src',
        'image_after_src',
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
    public function handle(ProductRepository $repository)
    {
        $datatables = DataTables::of($repository
            ->scopeDatatables($this->dataSelect, ['category']));

        $this->filterDatatable($datatables, $this->params, function ($query, $params) {
            if ($this->hasAttr($params, 'category_id')) {
                return $query->byCategory($params['category_id']);
            }
        });
        $this->columnDatatable($datatables, $repository->model);
        $datatables->addColumn('category', function ($item) {
            return $item->category->name;
        })->editColumn('image_before_src', function ($item) {
            return publicSrc($item->image_before_src);
        })->editColumn('image_after_src', function ($item) {
            return publicSrc($item->image_after_src);
        });

        return $datatables->make(true);
    }
}
