<?php

namespace App\Jobs;

use Auth;

abstract class Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;

    protected $prefix = 'backend.';

    public function __construct()
    {
        $this->user = Auth::guard('backend')->user();
    }
}
