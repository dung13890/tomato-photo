<?php

namespace App\Jobs\Contact;

use App\Jobs\Job;
use App\Contracts\Repositories\ContactRepository;
use App\Mail\CreateContact;
use Illuminate\Support\Facades\Mail;

class UserStoreJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $params;
    protected $fillable = [
        'name',
        'email',
        'message',
    ];

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ContactRepository $repository)
    {
        $data = array_only($this->params, $this->fillable);

        Mail::queue(new CreateContact([
            'name' => $data['name'],
            'email' => $data['email'],
            'content' => $data['message'],
        ]));
    }
}
