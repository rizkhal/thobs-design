<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectBroadcastEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $p;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($p)
    {
        $this->p = $p;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->view('back.project.email.mail')->with([
                        'projects' => $this->p
                    ]);
    }
}
