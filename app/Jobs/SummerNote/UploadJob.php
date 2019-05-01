<?php

namespace App\Jobs\SummerNote;

use App\Jobs\Job;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadableTrait;

class UploadJob extends Job
{
    use UploadableTrait;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $file;

    public function __construct(UploadedFile $file)
    {
        parent::__construct();
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->uploadFile($this->file);
    }
}
