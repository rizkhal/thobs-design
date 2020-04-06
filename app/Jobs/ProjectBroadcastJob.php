<?php

namespace App\Jobs;

use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ProjectBroadcastEmail;
use App\Repository\Subscriber\SubscriberRepo;

class ProjectBroadcastJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     * @var integer
     */
    public $tries = 5;

    /**
     * The number of seconds the job can run before timing out.
     * @var integer
     */
    public $timeout = 20;

    /**
     * Object of subscriber mail
     * @var object
     */
    protected $p;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($p)
    {
        $this->p = $p;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subscribers = app(SubscriberRepo::class)->all();
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new ProjectBroadcastEmail($this->p));
        }
    }
}
