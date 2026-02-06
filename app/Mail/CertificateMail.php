<?php

namespace App\Mail;

use App\Models\Registration;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    /**
     * Create a new message instance.
     */
    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Generate certificate PDF
        $pdf = Pdf::loadView('certificate.pdf', [
            'registration' => $this->registration
        ]);

        return $this->subject('Your Event Participation Certificate')
            ->view('certificate.pdf')   // ✅ THIS VIEW MUST EXIST
            ->attachData(
                $pdf->output(),
                'certificate.pdf',
                ['mime' => 'application/pdf']
            );
    }
}
