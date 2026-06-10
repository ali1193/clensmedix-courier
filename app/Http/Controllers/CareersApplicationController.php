<?php

namespace App\Http\Controllers;

use App\Mail\ContractorApplicationNotification;
use App\Models\ContractorApplication;
use App\Models\Setting;
use App\Support\DeferUntilResponseSent;
use App\Support\MailConfigurator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Throwable;

class CareersApplicationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if (empty($request->all()) && (int) $request->server('CONTENT_LENGTH') > 0) {
            return back()->withErrors([
                'upload' => 'Your upload is too large for the server limit. Please use smaller files (under 5MB each) and try again.',
            ])->withInput();
        }

        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'hours_available' => ['required', 'string', 'max:255'],
            'preferred_service_areas' => ['required', 'string', 'max:2000'],
            'has_courier_experience' => ['required', 'boolean'],
            'courier_experience_description' => ['nullable', 'required_if:has_courier_experience,1', 'string', 'max:2000'],
            'has_medical_experience' => ['required', 'boolean'],
            'medical_experience_explanation' => ['nullable', 'required_if:has_medical_experience,1', 'string', 'max:2000'],
            'has_smartphone_gps' => ['required', 'boolean'],
            'comfortable_with_apps' => ['required', 'boolean'],
            'emergency_contact_name' => ['required', 'string', 'max:100'],
            'emergency_contact_relationship' => ['required', 'string', 'max:100'],
            'emergency_contact_phone' => ['required', 'string', 'max:30'],
            'contractor_acknowledgment' => ['accepted'],
            'information_certification' => ['accepted'],
            'applicant_signature' => ['required', 'string', 'max:150'],
            'application_date' => ['required', 'date'],
            'drivers_license' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'vehicle_registration' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'auto_insurance' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'vehicle_photos' => ['required', 'array', 'min:1', 'max:5'],
            'vehicle_photos.*' => ['file', 'mimes:jpg,jpeg,png', 'max:5120'],
            'resume' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ]);

        try {
            Storage::disk('public')->makeDirectory('contractor-applications');

            $application = ContractorApplication::create([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'hours_available' => $data['hours_available'],
                'preferred_service_areas' => $data['preferred_service_areas'],
                'has_courier_experience' => (bool) $data['has_courier_experience'],
                'courier_experience_description' => $data['courier_experience_description'] ?? null,
                'has_medical_experience' => (bool) $data['has_medical_experience'],
                'medical_experience_explanation' => $data['medical_experience_explanation'] ?? null,
                'has_smartphone_gps' => (bool) $data['has_smartphone_gps'],
                'comfortable_with_apps' => (bool) $data['comfortable_with_apps'],
                'emergency_contact_name' => $data['emergency_contact_name'],
                'emergency_contact_relationship' => $data['emergency_contact_relationship'],
                'emergency_contact_phone' => $data['emergency_contact_phone'],
                'applicant_signature' => $data['applicant_signature'],
                'application_date' => $data['application_date'],
                'drivers_license_path' => '',
                'vehicle_registration_path' => '',
                'auto_insurance_path' => '',
                'vehicle_photos_paths' => [],
            ]);

            $baseDir = 'contractor-applications/'.$application->id;

            $application->update([
                'drivers_license_path' => $request->file('drivers_license')->store($baseDir, 'public'),
                'vehicle_registration_path' => $request->file('vehicle_registration')->store($baseDir, 'public'),
                'auto_insurance_path' => $request->file('auto_insurance')->store($baseDir, 'public'),
                'vehicle_photos_paths' => collect($request->file('vehicle_photos'))
                    ->map(fn ($photo) => $photo->store($baseDir.'/vehicle-photos', 'public'))
                    ->all(),
                'resume_path' => $request->hasFile('resume')
                    ? $request->file('resume')->store($baseDir, 'public')
                    : null,
            ]);

            $applicationId = $application->id;

            DeferUntilResponseSent::run(function () use ($applicationId) {
                $application = ContractorApplication::find($applicationId);
                if (! $application) {
                    return;
                }

                MailConfigurator::apply();

                $toAddress = Setting::get('contact.email') ?: config('mail.from.address');

                if ($toAddress) {
                    Mail::to($toAddress)->send(new ContractorApplicationNotification($application));
                }
            });

            Log::info('Contractor application submitted', [
                'application_id' => $applicationId,
                'full_name' => $application->full_name,
                'email' => $application->email,
            ]);

            return redirect()
                ->route('careers.apply')
                ->with('success', 'Thank you! Your application has been submitted successfully. Our team will review your information and contact you if there is a match.');
        } catch (Throwable $e) {
            Log::error('Contractor application submission failed', [
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withErrors([
                    'submission' => 'We could not submit your application. Please check your files are under 5MB each and try again.',
                ])
                ->withInput();
        }
    }
}
