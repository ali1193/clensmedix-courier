<?php

namespace App\Mail;

use App\Models\ContractorApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ContractorApplicationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContractorApplication $application)
    {
    }

    public function build(): self
    {
        $mail = $this->subject('New contractor application from '.$this->application->full_name)
            ->view('emails.contractor-application');

        $files = array_filter([
            $this->application->drivers_license_path,
            $this->application->vehicle_registration_path,
            $this->application->auto_insurance_path,
            $this->application->resume_path,
            ...($this->application->vehicle_photos_paths ?? []),
        ]);

        foreach ($files as $path) {
            if (Storage::disk('public')->exists($path)) {
                $mail->attach(Storage::disk('public')->path($path));
            }
        }

        return $mail;
    }
}
