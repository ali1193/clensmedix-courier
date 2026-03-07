<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\EnsureAdmin;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

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

        Route::resource('services', ServiceController::class)->except(['show']);

        Route::get('contacts', [ContactSubmissionController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{contactSubmission}', [ContactSubmissionController::class, 'show'])->name('contacts.show');
        Route::delete('contacts/{contactSubmission}', [ContactSubmissionController::class, 'destroy'])->name('contacts.destroy');
    });
