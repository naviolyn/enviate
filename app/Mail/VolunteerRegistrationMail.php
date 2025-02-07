<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VolunteerRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $volunteerName;
    public $userName;

    /**
     * Create a new message instance.
     */
    public function __construct($volunteerName, $userName)
    {
        $this->volunteerName = $volunteerName;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Volunteer Registration Successful')
                    ->view('emails.volunteer-registration');
    }
}
