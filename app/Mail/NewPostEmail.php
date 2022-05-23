<?php

namespace App\Mail;

use App\Models\Subscriber;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subscriber;
    public $mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->title = $details['title'];
        $this->body = $details['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.post');
    }
}
