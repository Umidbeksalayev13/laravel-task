<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use App\Models\Application;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    /**
     * Create a new message instance.
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Application Created'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.application_created',
            with: ['application' => $this->application]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        if (!$this->application->file_url) {
            return [];
        }

        $filePath = storage_path("app/public/{$this->application->file_url}");

        if (!file_exists($filePath)) {
            return [];
        }

        return [
            Attachment::fromPath($filePath)
                ->as(basename($filePath)) // Fayl nomi
                ->withMime(mime_content_type($filePath)) // MIME turini aniqlash
        ];
    }
}
