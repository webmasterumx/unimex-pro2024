<?php

namespace App\Mail;

use App\Http\Controllers\ExtrasUnimexController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoProspecto extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $valores;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {

        $this->data = $data;
       
        $valores = app(ExtrasUnimexController::class)->complementoMailContactoProspecto($this->data);
        $this->valores = $valores;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registro Home Metro',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.contactoProspecto',
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
