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

        $attachments = [
            ['path' => $this->application->drivers_license_path, 'name' => 'drivers-license'],
            ['path' => $this->application->vehicle_registration_path, 'name' => 'vehicle-registration'],
            ['path' => $this->application->auto_insurance_path, 'name' => 'auto-insurance'],
        ];

        if ($this->application->resume_path) {
            $attachments[] = ['path' => $this->application->resume_path, 'name' => 'resume'];
        }

        foreach ($this->application->vehicle_photos_paths ?? [] as $index => $path) {
            $attachments[] = ['path' => $path, 'name' => 'vehicle-photo-'.($index + 1)];
        }

        foreach ($attachments as $attachment) {
            $path = $attachment['path'];
            if (! $path || ! Storage::disk('public')->exists($path)) {
                continue;
            }

            $extension = pathinfo($path, PATHINFO_EXTENSION) ?: 'bin';

            $mail->attachFromStorageDisk(
                'public',
                $path,
                $attachment['name'].'.'.$extension,
                ['mime' => Storage::disk('public')->mimeType($path)]
            );
        }

        return $mail;
    }
}
