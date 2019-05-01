<?php

namespace App\Jobs\Post;

use App\Jobs\Job;
use Yajra\DataTables\Facades\DataTables;
use App\Contracts\Repositories\PostRepository;
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
        'ceo_title',
        'ceo_keywords',
        'ceo_description',
        'locked',
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
    public function handle(PostRepository $repository)
    {
        $datatables = DataTables::of($repository
            ->scopeDatatables($this->dataSelect));

        $this->filterDatatable($datatables, $this->params);
        $this->columnDatatable($datatables, $repository->model);

        return $datatables->make(true);
    }
}
