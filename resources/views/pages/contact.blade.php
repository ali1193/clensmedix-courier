@extends('layouts.app')

@section('content')
<div class="bg-slate-50 dark:bg-slate-900/30 border-b border-slate-200 dark:border-slate-800">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
<nav class="flex items-center gap-2 text-sm font-medium">
<a class="text-slate-500 hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
<span class="material-symbols-outlined text-slate-300 dark:text-slate-600 text-xs">chevron_right</span>
<span class="text-primary">Contact</span>
</nav>
</div>
</div>
<section class="relative py-20 lg:py-32 overflow-hidden bg-slate-50 dark:bg-slate-900/50">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
<div class="grid lg:grid-cols-2 gap-12 items-center">
<div class="max-w-2xl">
<h1 class="text-4xl md:text-6xl font-black text-slate-900 dark:text-white leading-[1.1] mb-6">
                                Contact <span class="text-primary">ClensMedix</span> Courier
                            </h1>
<p class="text-lg md:text-xl text-slate-600 dark:text-slate-400 leading-relaxed mb-8">
                                Reliable medical courier services ready to support your healthcare delivery needs. We bridge the gap between clinics, labs, and patients.
                            </p>
<div class="flex flex-wrap gap-4">
<a class="bg-primary text-slate-900 px-8 py-4 rounded-xl text-base font-bold hover:scale-[1.02] transition-transform inline-block" href="#request-pickup">
                                    Get Started
                                </a>
<a class="border-2 border-slate-200 dark:border-slate-700 px-8 py-4 rounded-xl text-base font-bold hover:bg-white dark:hover:bg-slate-800 transition-colors inline-block" href="#contact-options">
                                    Our Network
                                </a>
</div>
</div>
<div class="relative">
<div class="aspect-video lg:aspect-square rounded-3xl overflow-hidden shadow-2xl border-8 border-white dark:border-slate-800 bg-primary/5">
<img alt="ClensMedix Courier Services branding" class="w-full h-full object-cover" src="{{ asset('images/contact-us.jpg') }}"/>
</div>
<div class="absolute -bottom-6 -left-6 bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-xl hidden md:block">
<div class="flex items-center gap-4">
<div class="bg-primary/20 p-3 rounded-full text-primary">
<span class="material-symbols-outlined">verified</span>
</div>
<div>
<p class="text-sm font-bold">HIPAA Compliant</p>
<p class="text-xs text-slate-500">Certified Logistics</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-16 bg-white dark:bg-background-dark" id="contact-options">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid md:grid-cols-3 gap-8">
@php
    $contactPhone = \App\Models\Setting::get('contact.phone', '832-466-1443');
    $contactEmail = \App\Models\Setting::get('contact.email', 'Clensmedix@gmail.com');
@endphp
<div class="group p-8 rounded-2xl border border-slate-100 dark:border-slate-800 bg-background-light dark:bg-slate-900/50 hover:border-primary transition-colors">
<div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-slate-900 transition-colors">
<span class="material-symbols-outlined">call</span>
</div>
<h3 class="text-xl font-bold mb-2">Call Us</h3>
<p class="text-slate-600 dark:text-slate-400 mb-4">Available for urgent dispatch and inquiries.</p>
<a class="text-primary font-bold text-lg hover:underline transition-all" href="tel:{{ preg_replace('/[^0-9]/', '', $contactPhone) }}">{{ $contactPhone }}</a>
</div>
<div class="group p-8 rounded-2xl border border-slate-100 dark:border-slate-800 bg-background-light dark:bg-slate-900/50 hover:border-primary transition-colors">
<div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-slate-900 transition-colors">
<span class="material-symbols-outlined">mail</span>
</div>
<h3 class="text-xl font-bold mb-2">Email Us</h3>
<p class="text-slate-600 dark:text-slate-400 mb-4">Send us your documentation or general questions.</p>
<a class="text-primary font-bold text-lg hover:underline transition-all" href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>
</div>
<div class="group p-8 rounded-2xl border border-slate-100 dark:border-slate-800 bg-background-light dark:bg-slate-900/50 hover:border-primary transition-colors">
<div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-slate-900 transition-colors">
<span class="material-symbols-outlined">explore</span>
</div>
<h3 class="text-xl font-bold mb-2">Service Area</h3>
<p class="text-slate-600 dark:text-slate-400 mb-4">Proudly serving the wider Texas medical district.</p>
<p class="text-primary font-bold text-lg">Katy, Cypress, Fulshear, Houston</p>
</div>
</div>
</div>
</section>
<section class="py-20">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-2xl overflow-hidden border border-slate-100 dark:border-slate-800">
<div class="grid lg:grid-cols-2">
<div class="relative hidden lg:block">
<img alt="Courier Delivery" class="w-full h-full object-cover" data-alt="Professional courier driver delivering a temperature-controlled medical package" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAiVZy35lCqv0lsYOIcI6K38izADHIC9Y06_LYSUhceB0exdWG7Xz6o6FerTe2uKJ6WH3_7Bogo3Hjk0qid8qYJkmAaA0wPZwnAj-EMTMDWE1mV0KQ9BGpbrTCZA4fv4rbh4-Ea4aEH5LpIUhYl7KexFwmaOFo0G-x1Sml0kFkTRaAcqEMLKwEO1KLZQ_bceF3_D6btYIwRPVG5xXtluN7pdX5ZBSvt7kavpM2YWiR3Hi383-bQ86Kg_kwTJ-V9ZfTmawXvxrMu6uA"/>
<div class="absolute inset-0 bg-gradient-to-r from-transparent to-white dark:to-slate-900"></div>
</div>
<div class="p-8 md:p-12 lg:p-16">
<div class="mb-10">
<h2 class="text-3xl font-black text-slate-900 dark:text-white mb-4" id="request-pickup">Request a Pickup</h2>
<p class="text-slate-500 dark:text-slate-400">Fill out the form below to schedule a medical transport. Our team will confirm within 15 minutes.</p>
</div>
@if (session('success'))
<div class="mb-6 rounded-xl border border-primary/30 bg-primary/10 p-4 text-sm font-semibold text-slate-900 dark:text-slate-100">
{{ session('success') }}
</div>
@endif
<form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
@csrf
<input type="hidden" name="source" value="contact_page">
<div class="grid md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-sm font-semibold">Full Name</label>
<input class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-primary" placeholder="John Doe" type="text" name="name" required/>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold">Phone Number</label>
<input class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-primary" placeholder="832-000-0000" type="tel" name="phone"/>
</div>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold">Email</label>
<input class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-primary" placeholder="john@clinic.com" type="email" name="email"/>
</div>
<div class="grid md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-sm font-semibold">Pickup Location</label>
<input class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-primary" placeholder="Facility Address" type="text" name="pickup_location"/>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold">Delivery Location</label>
<input class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-primary" placeholder="Destination Address" type="text" name="delivery_location"/>
</div>
</div>
<div class="grid md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-sm font-semibold">Package Type</label>
<select class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-primary" name="package_type">
<option>Medical Sample</option>
<option>Equipment</option>
<option>Pharmaceutical</option>
</select>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold">Preferred Pickup Time</label>
<input class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-primary" type="time" name="preferred_pickup_time"/>
</div>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold">Message / Special Instructions</label>
<textarea class="w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-primary" placeholder="Room number, contact person, or urgency..." rows="4" name="message"></textarea>
</div>
<button class="w-full bg-primary text-slate-900 py-4 rounded-xl text-lg font-bold hover:shadow-lg hover:shadow-primary/20 transition-all" type="submit">
                                        Submit Request
                                    </button>
</form>
</div>
</div>
</div>
</div>
</section>
<section class="py-16 bg-slate-50 dark:bg-slate-900/30">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="max-w-3xl mx-auto">
<div class="bg-white dark:bg-slate-800 p-8 md:p-12 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-xl relative overflow-hidden">
<div class="absolute top-0 right-0 p-8 opacity-10">
<span class="material-symbols-outlined text-8xl">schedule</span>
</div>
<div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
<div class="bg-primary/20 p-6 rounded-2xl text-primary">
<span class="material-symbols-outlined text-4xl">schedule</span>
</div>
<div class="text-center md:text-left">
<h2 class="text-2xl font-black text-slate-900 dark:text-white mb-2">Operating Hours</h2>
<p class="text-slate-600 dark:text-slate-400 text-lg">Our standard operations run during business hours for scheduled routes.</p>
<div class="mt-4 inline-block bg-primary/10 px-4 py-2 rounded-full">
<span class="text-slate-900 dark:text-white font-bold">Monday – Friday: 8:00 AM – 6:00 PM</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<x-footer />
@endsection
