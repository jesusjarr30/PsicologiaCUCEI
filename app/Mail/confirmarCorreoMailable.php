<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Config;


class confirmarCorreoMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $correo;
    public $nombre;

    /**
     * Create a new message instance.
     */
    public function __construct($email,$nombre)
    {
        $this->nombre=$nombre;
        $this->correo=$email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('CitasPiscologia@outlook.com','Citas-Piscologia'),
            subject: 'Registro cuenta Piscologia CUCEI',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'MailMessages.ConfirmarUsuario',
            with: [
                'correo' => $this->correo,
                'nombre' => $this->nombre,
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
