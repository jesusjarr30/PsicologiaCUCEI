<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class DatosCita extends Mailable
{
    use Queueable, SerializesModels;
    public $idPaciente;
    public $idPsicologo;
    public $horario;

    /**
     * Create a new message instance.
     */
    public function __construct($idPaciente,$idPsicologo,$horario)
    {
        $this->idPaciente=$idPaciente;
        $this->idPsicologo=$idPsicologo;
        $this->horario=$horario;
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
            view: 'MailMessages.ConfirmarUsuario',
            with: [
                //'correo' => $this->correo,
                //'nombre' => $this->nombre,
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
