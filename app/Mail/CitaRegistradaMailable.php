<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CitaRegistradaMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $correo;
    public $nombre;

    /**
     * Create a new message instance.
     */
    public function __construct($correo,$nombre)
    {
        $this->nombre=$nombre;
        $this->correo=$correo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jesus.jarr.30@gmail.com','Jesus Renteria'),
            subject: 'Confirmacion de cita CUCEI',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'MailMessages.RegistroCita',
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
