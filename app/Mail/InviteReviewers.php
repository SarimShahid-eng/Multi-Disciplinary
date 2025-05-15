<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\ManuscriptSuggestedReviewer;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteReviewers extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
//  public function __construct(
//     public ManuscriptSuggestedReviewer $suggestedReviewer,
// ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
      return new Envelope(
              from: 'testing@mipress.org',
            subject: 'Manuscript Reviewer Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'users.academic_editor.suggested_reviewer_email',
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
