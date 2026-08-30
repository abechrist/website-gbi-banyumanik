<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public ContactMessage $contactMessage;

    public function __construct(ContactMessage $contactMessage)
    {
        $this->contactMessage = $contactMessage;
    }

    public function envelope(): Envelope
    {
        $subjectMap = [
            'info_umum' => 'Informasi Umum',
            'jadwal_ibadah' => 'Tanya Jadwal Ibadah',
            'pelayanan' => 'Pelayanan & Kegiatan',
            'pernikahan' => 'Pernikahan',
            'baptisan' => 'Baptisan',
            'lainnya' => 'Lainnya',
        ];

        $subject = $subjectMap[$this->contactMessage->subject] ?? $this->contactMessage->subject;

        return new Envelope(
            subject: "[GBI Banyumanik] Pesan Baru: {$subject}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-message',
            with: [
                'message' => $this->contactMessage,
            ],
        );
    }
}
