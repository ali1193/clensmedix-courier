<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

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

    Log::info('Website inquiry submitted', [
        'name' => $data['name'],
        'phone' => $data['phone'] ?? null,
        'email' => $data['email'] ?? null,
        'pickup_location' => $data['pickup_location'] ?? null,
        'delivery_location' => $data['delivery_location'] ?? null,
        'package_type' => $data['package_type'] ?? null,
        'preferred_pickup_time' => $data['preferred_pickup_time'] ?? null,
        'source' => $data['source'] ?? null,
    ]);

    return back()->with('success', 'Thanks! We received your request and will contact you shortly.');
})->name('contact.submit');
