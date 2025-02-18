<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $emailMessage, $subject, $templateId;
    /**
     * Create a new message instance.
     */
    public function __construct($message, $subject, $templateId)
    {
        $this->emailMessage = $message;
        $this->subject = $subject;
        $this->templateId = $templateId;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // subject: 'Send Email',
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content($templateId): Content
    {
        // $template = EmailTemplate::where('id', $templateId)->first();
        // return new Content(
        //     view: 'mail',
        //     with: [
        //         'content' => $template->content ?? ''
        //     ]
        // );
        return new Content(
            view: 'mail',
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
