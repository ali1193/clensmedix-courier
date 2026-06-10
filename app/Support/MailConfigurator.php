<?php

namespace App\Support;

use App\Models\Setting;

class MailConfigurator
{
    public static function apply(): void
    {
        $smtpHost = Setting::get('smtp.host');
        if (! $smtpHost) {
            return;
        }

        $encryption = Setting::get('smtp.encryption');

        $scheme = match ($encryption) {
            'ssl' => 'smtps',
            'tls' => 'smtp',
            'smtp', 'smtps' => $encryption,
            default => config('mail.mailers.smtp.scheme'),
        };

        config([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.host' => $smtpHost,
            'mail.mailers.smtp.port' => Setting::get('smtp.port') ?: config('mail.mailers.smtp.port'),
            'mail.mailers.smtp.username' => Setting::get('smtp.username') ?: config('mail.mailers.smtp.username'),
            'mail.mailers.smtp.password' => Setting::get('smtp.password') ?: config('mail.mailers.smtp.password'),
            'mail.mailers.smtp.scheme' => $scheme,
            'mail.from.address' => Setting::get('smtp.from_email') ?: config('mail.from.address'),
            'mail.from.name' => Setting::get('smtp.from_name') ?: config('mail.from.name'),
        ]);
    }
}
