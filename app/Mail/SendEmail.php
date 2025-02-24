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
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = EmailTemplate::where('id', $this->templateId)->first();
    
        if (!$template) {
            abort(404, 'Email template not found');
        }
    
        return new Content(
            view: 'mail', 
            with: [
                'content' => $template->content, 
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
