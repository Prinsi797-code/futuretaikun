<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $role;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $role, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'New User Registration Notification',
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
            view: 'emails.new_user_registered',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'password' => $this->password,
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