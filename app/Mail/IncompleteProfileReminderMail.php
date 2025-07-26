<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class IncompleteProfileReminderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $role;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $role, $email)
    {
        $this->name = $name;
        $this->role = $role;
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Please complete your profile on Future Taikun',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.incomplete_profile_reminder',
            with: [
                'name' => $this->name,
                'role' => $this->role,
                'email' => $this->email,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}