<?php

namespace App\Mail;

use App\Models\Cliente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Usuario;

class DatosCita extends Mailable
{
    use Queueable, SerializesModels;
    public $idPaciente;
    public $usuario_id;
    public $email;
    public $fecha;
    /**
     * Create a new message instance.
     */
    public function __construct($email,$fecha,$usuario_id)
    {
      
       $this->usuario_id=$usuario_id;
       $this->email=$email;
       $this->fecha=$fecha;

    }
    // Mail::to($email)->send(new CitaRegistradaMailable($email,$fechaCompleta,$idParaCita));
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
        info("datoscitas");
        $user = Usuario::find($this->usuario_id);
        info($user);
        return new Content(
            view: 'MailMessages.DatosCita',
            with: [
                'correo' => $this->email,
                'fecha' => $this->fecha,
                'psicologoNombre'=>$user->nombre,
                'psicologoCorreo'=>$user->email,
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
