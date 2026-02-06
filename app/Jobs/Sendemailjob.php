<?php

namespace App\Jobs;

use App\Mail\SurveyLinkMail;
use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendemailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $registration;

    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    public function handle(): void
    {
        Mail::to($this->registration->email)
            ->send(new SurveyLinkMail($this->registration));
    }
}
