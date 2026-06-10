<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Service;
use App\Models\Setting;
use App\Mail\ContactSubmissionNotification;
use App\Mail\ContractorApplicationNotification;
use App\Models\ContractorApplication;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Middleware\EnsureAdmin;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    $services = Service::active()->orderBy('display_order')->orderBy('name')->get();

    return view('pages.services', compact('services'));
})->name('services');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/careers', function () {
    return view('pages.careers');
})->name('careers');

Route::get('/careers/apply', function () {
    return view('pages.careers-apply');
})->name('careers.apply');

Route::post('/careers/apply', function (Request $request) {
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

    $driversLicensePath = $request->file('drivers_license')->store($baseDir, 'public');
    $vehicleRegistrationPath = $request->file('vehicle_registration')->store($baseDir, 'public');
    $autoInsurancePath = $request->file('auto_insurance')->store($baseDir, 'public');

    $vehiclePhotoPaths = [];
    foreach ($request->file('vehicle_photos') as $photo) {
        $vehiclePhotoPaths[] = $photo->store($baseDir.'/vehicle-photos', 'public');
    }

    $resumePath = null;
    if ($request->hasFile('resume')) {
        $resumePath = $request->file('resume')->store($baseDir, 'public');
    }

    $application->update([
        'drivers_license_path' => $driversLicensePath,
        'vehicle_registration_path' => $vehicleRegistrationPath,
        'auto_insurance_path' => $autoInsurancePath,
        'vehicle_photos_paths' => $vehiclePhotoPaths,
        'resume_path' => $resumePath,
    ]);

    $smtpHost = Setting::get('smtp.host');
    if ($smtpHost) {
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

    $toAddress = Setting::get('contact.email') ?: config('mail.from.address');

    try {
        if ($toAddress) {
            Mail::to($toAddress)->send(new ContractorApplicationNotification($application->fresh()));
        }
    } catch (\Throwable $e) {
        Log::error('Failed to send contractor application notification email', [
            'error' => $e->getMessage(),
            'application_id' => $application->id,
        ]);
    }

    Log::info('Contractor application submitted', [
        'application_id' => $application->id,
        'full_name' => $application->full_name,
        'email' => $application->email,
    ]);

    return redirect()->route('careers.apply')->with('success', 'Thank you! Your application has been submitted successfully. Our team will review your information and contact you if there is a match.');
})->name('careers.apply.submit');

Route::post('/contact', function (Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'phone' => ['nullable', 'string', 'max:30'],
        'email' => ['nullable', 'email', 'max:150'],
        'pickup_location' => ['nullable', 'string', 'max:255'],
        'delivery_location' => ['nullable', 'string', 'max:255'],
        'package_type' => ['nullable', 'string', 'max:60'],
        'preferred_pickup_time' => ['nullable', 'string', 'max:30'],
        'message' => ['nullable', 'string', 'max:2000'],
        'source' => ['nullable', 'string', 'max:60'],
    ]);

    $submission = \App\Models\ContactSubmission::create([
        'name' => $data['name'],
        'phone' => $data['phone'] ?? null,
        'email' => $data['email'] ?? null,
        'pickup_location' => $data['pickup_location'] ?? null,
        'delivery_location' => $data['delivery_location'] ?? null,
        'package_type' => $data['package_type'] ?? null,
        'preferred_pickup_time' => $data['preferred_pickup_time'] ?? null,
        'source' => $data['source'] ?? null,
        'message' => $data['message'] ?? null,
    ]);

    // Configure mailer from settings if provided
    $smtpHost = Setting::get('smtp.host');
    if ($smtpHost) {
        $encryption = Setting::get('smtp.encryption');

        // Map human-friendly encryption values to supported schemes
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

    $toAddress = Setting::get('contact.email') ?: config('mail.from.address');

    try {
        if ($toAddress) {
            Mail::to($toAddress)->send(new ContactSubmissionNotification($submission));
        }
    } catch (\Throwable $e) {
        Log::error('Failed to send contact notification email', [
            'error' => $e->getMessage(),
        ]);
    }

    Log::info('Website inquiry submitted', [
        'name' => $data['name'],
        'phone' => $data['phone'] ?? null,
        'email' => $data['email'] ?? null,
        'pickup_location' => $data['pickup_location'] ?? null,
        'delivery_location' => $data['delivery_location'] ?? null,
        'package_type' => $data['package_type'] ?? null,
        'preferred_pickup_time' => $data['preferred_pickup_time'] ?? null,
        'source' => $data['source'] ?? null,
        'submission_id' => $submission->id,
    ]);

    return back()->with('success', 'Thanks! We received your request and will contact you shortly.');
})->name('contact.submit');

// Admin authentication
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.attempt');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin area
Route::middleware(['auth', EnsureAdmin::class])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
        Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

        Route::get('/content', [ContentController::class, 'index'])->name('content.index');
        Route::post('/content', [ContentController::class, 'update'])->name('content.update');

        Route::resource('services', ServiceController::class)->except(['show']);

        Route::get('contacts', [ContactSubmissionController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{contactSubmission}', [ContactSubmissionController::class, 'show'])->name('contacts.show');
        Route::delete('contacts/{contactSubmission}', [ContactSubmissionController::class, 'destroy'])->name('contacts.destroy');
    });
