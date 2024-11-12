<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TrabajaUnimex extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;
    public $file;

    /**
     * Create a new message instance.
     */
    public function __construct($datos, $file)
    {
        $this->datos = $datos;
        $this->file = $file;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Trabaja en UNIMEX Metro',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.trabajaUnimex',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->file)
                ->as('cv.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
