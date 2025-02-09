<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VolunteerRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContent;

    public function __construct($message)
    {
        $this->messageContent = $message;
    }

    public function build()
    {
        return $this->subject('Volunteer Registration Confirmation')
            ->view('emails.volunteer-registration')
            ->with(['messageContent' => $this->messageContent]);
    }
}
