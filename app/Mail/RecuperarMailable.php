<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Usuario;

class RecuperarMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $correo;

    /**
     * Create a new message instance.
     */
    public function __construct($email)
    {
        $this->correo=$email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jesus.jarr.30@gmail.com','Jesus Renteria'),
            subject: 'Registro cuenta Piscologia CUCEI',
        );
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'MailMessages.InvitacionRecuperacions',
            with: [
                'correo' => $this->correo,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
