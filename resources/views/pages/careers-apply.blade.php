@extends('layouts.app')

@php
    $inputClass = 'w-full rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-[5px] focus:border-primary focus:ring-primary';
    $labelClass = 'text-sm font-semibold';
    $sectionClass = 'space-y-6 p-6 md:p-8 rounded-2xl border border-slate-100 dark:border-slate-800 bg-background-light dark:bg-slate-900/50';
@endphp

@section('content')
<div class="bg-slate-50 dark:bg-slate-900/30 border-b border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex items-center gap-2 text-sm font-medium" aria-label="Breadcrumb">
            <a class="text-slate-500 hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
            <span class="material-symbols-outlined text-slate-300 dark:text-slate-600 text-xs" aria-hidden="true">chevron_right</span>
            <a class="text-slate-500 hover:text-primary transition-colors" href="{{ route('careers') }}">Careers</a>
            <span class="material-symbols-outlined text-slate-300 dark:text-slate-600 text-xs" aria-hidden="true">chevron_right</span>
            <span class="text-primary">Apply</span>
        </nav>
    </div>
</div>

<section class="py-12 lg:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
            <h1 class="text-3xl md:text-5xl font-black text-slate-900 dark:text-white mb-4">
                Contractor <span class="text-primary">Application</span>
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                Complete the form below to apply as an independent medical courier contractor with Clensmedix.
            </p>
        </div>

        @if (session('success'))
            <div class="mb-8 rounded-xl border border-primary/30 bg-primary/10 p-6 text-center" role="status">
                <div class="w-16 h-16 bg-primary/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-primary text-3xl" aria-hidden="true">check_circle</span>
                </div>
                <p class="text-lg font-semibold text-slate-900 dark:text-slate-100">{{ session('success') }}</p>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="mb-8 rounded-xl border border-red-300 dark:border-red-800 bg-red-50 dark:bg-red-900/20 p-4" role="alert">
                <p class="font-semibold text-red-800 dark:text-red-200 mb-2">Please correct the following errors:</p>
                <ul class="list-disc list-inside space-y-1 text-sm text-red-700 dark:text-red-300">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @unless (session('success'))
        <form action="{{ route('careers.apply.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-8" id="contractor-application-form" novalidate>
            @csrf

            {{-- Applicant Information --}}
            <fieldset class="{{ $sectionClass }}">
                <legend class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined" aria-hidden="true">person</span>
                    </span>
                    Applicant Information
                </legend>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2 md:col-span-2">
                        <label class="{{ $labelClass }}" for="full_name">Full Name</label>
                        <input class="{{ $inputClass }}" id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" required autocomplete="name"/>
                    </div>
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="email">Email</label>
                        <input class="{{ $inputClass }}" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                    </div>
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="phone">Phone Number</label>
                        <input class="{{ $inputClass }}" id="phone" type="tel" name="phone" value="{{ old('phone') }}" required autocomplete="tel"/>
                    </div>
                </div>
            </fieldset>

            {{-- Availability --}}
            <fieldset class="{{ $sectionClass }}">
                <legend class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined" aria-hidden="true">schedule</span>
                    </span>
                    Availability
                </legend>
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="hours_available">Hours Available</label>
                        <input class="{{ $inputClass }}" id="hours_available" type="text" name="hours_available" value="{{ old('hours_available') }}" placeholder="e.g. Weekdays 8am–5pm, weekends available" required/>
                    </div>
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="preferred_service_areas">Preferred Service Area(s)</label>
                        <textarea class="{{ $inputClass }}" id="preferred_service_areas" name="preferred_service_areas" rows="3" placeholder="List the cities or regions where you prefer to work..." required>{{ old('preferred_service_areas') }}</textarea>
                    </div>
                </div>
            </fieldset>

            {{-- Experience --}}
            <fieldset class="{{ $sectionClass }}">
                <legend class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined" aria-hidden="true">work_history</span>
                    </span>
                    Experience
                </legend>
                <div class="space-y-8">
                    <div class="space-y-4">
                        <p class="{{ $labelClass }}" id="courier-experience-label">Do you have previous courier or delivery experience?</p>
                        <div class="flex flex-wrap gap-6" role="radiogroup" aria-labelledby="courier-experience-label">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="has_courier_experience" value="1" class="text-primary focus:ring-primary" {{ old('has_courier_experience') === '1' ? 'checked' : '' }} required data-toggle-target="courier-experience-details"/>
                                <span>Yes</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="has_courier_experience" value="0" class="text-primary focus:ring-primary" {{ old('has_courier_experience', '0') === '0' ? 'checked' : '' }} required data-toggle-target="courier-experience-details"/>
                                <span>No</span>
                            </label>
                        </div>
                        <div id="courier-experience-details" class="space-y-2 {{ old('has_courier_experience') === '1' ? '' : 'hidden' }}">
                            <label class="{{ $labelClass }}" for="courier_experience_description">If Yes, Please Describe</label>
                            <textarea class="{{ $inputClass }}" id="courier_experience_description" name="courier_experience_description" rows="3">{{ old('courier_experience_description') }}</textarea>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <p class="{{ $labelClass }}" id="medical-experience-label">Do you have experience handling medical specimens or sensitive deliveries?</p>
                        <div class="flex flex-wrap gap-6" role="radiogroup" aria-labelledby="medical-experience-label">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="has_medical_experience" value="1" class="text-primary focus:ring-primary" {{ old('has_medical_experience') === '1' ? 'checked' : '' }} required data-toggle-target="medical-experience-details"/>
                                <span>Yes</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="has_medical_experience" value="0" class="text-primary focus:ring-primary" {{ old('has_medical_experience', '0') === '0' ? 'checked' : '' }} required data-toggle-target="medical-experience-details"/>
                                <span>No</span>
                            </label>
                        </div>
                        <div id="medical-experience-details" class="space-y-2 {{ old('has_medical_experience') === '1' ? '' : 'hidden' }}">
                            <label class="{{ $labelClass }}" for="medical_experience_explanation">If Yes, Please Explain</label>
                            <textarea class="{{ $inputClass }}" id="medical_experience_explanation" name="medical_experience_explanation" rows="3">{{ old('medical_experience_explanation') }}</textarea>
                        </div>
                    </div>
                </div>
            </fieldset>

            {{-- Technology & Communication --}}
            <fieldset class="{{ $sectionClass }}">
                <legend class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined" aria-hidden="true">smartphone</span>
                    </span>
                    Technology &amp; Communication
                </legend>
                <div class="space-y-8">
                    <div class="space-y-4">
                        <p class="{{ $labelClass }}" id="smartphone-label">Do you own a smartphone with GPS capability?</p>
                        <div class="flex flex-wrap gap-6" role="radiogroup" aria-labelledby="smartphone-label">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="has_smartphone_gps" value="1" class="text-primary focus:ring-primary" {{ old('has_smartphone_gps', '1') === '1' ? 'checked' : '' }} required/>
                                <span>Yes</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="has_smartphone_gps" value="0" class="text-primary focus:ring-primary" {{ old('has_smartphone_gps') === '0' ? 'checked' : '' }} required/>
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <p class="{{ $labelClass }}" id="apps-label">Are you comfortable using delivery and routing apps?</p>
                        <div class="flex flex-wrap gap-6" role="radiogroup" aria-labelledby="apps-label">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="comfortable_with_apps" value="1" class="text-primary focus:ring-primary" {{ old('comfortable_with_apps', '1') === '1' ? 'checked' : '' }} required/>
                                <span>Yes</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="comfortable_with_apps" value="0" class="text-primary focus:ring-primary" {{ old('comfortable_with_apps') === '0' ? 'checked' : '' }} required/>
                                <span>No</span>
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>

            {{-- Emergency Contact --}}
            <fieldset class="{{ $sectionClass }}">
                <legend class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined" aria-hidden="true">contact_emergency</span>
                    </span>
                    Emergency Contact
                </legend>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2 md:col-span-2">
                        <label class="{{ $labelClass }}" for="emergency_contact_name">Emergency Contact Name</label>
                        <input class="{{ $inputClass }}" id="emergency_contact_name" type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name') }}" required autocomplete="name"/>
                    </div>
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="emergency_contact_relationship">Relationship</label>
                        <input class="{{ $inputClass }}" id="emergency_contact_relationship" type="text" name="emergency_contact_relationship" value="{{ old('emergency_contact_relationship') }}" placeholder="e.g. Spouse, Parent" required/>
                    </div>
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="emergency_contact_phone">Phone Number</label>
                        <input class="{{ $inputClass }}" id="emergency_contact_phone" type="tel" name="emergency_contact_phone" value="{{ old('emergency_contact_phone') }}" required autocomplete="tel"/>
                    </div>
                </div>
            </fieldset>

            {{-- Independent Contractor Acknowledgment --}}
            <fieldset class="{{ $sectionClass }}">
                <legend class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined" aria-hidden="true">gavel</span>
                    </span>
                    Independent Contractor Acknowledgment
                </legend>
                <div class="space-y-6">
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed p-4 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
                        I understand that if selected, I will operate as an independent contractor and not as an employee of Clensmedix. I understand that I am responsible for maintaining a valid driver's license, vehicle registration, and automobile insurance at all times.
                    </p>
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" name="contractor_acknowledgment" value="1" class="mt-1 text-primary focus:ring-primary rounded" {{ old('contractor_acknowledgment') ? 'checked' : '' }} required/>
                        <span class="text-sm text-slate-700 dark:text-slate-300">I acknowledge and agree to the independent contractor terms stated above.</span>
                    </label>
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" name="information_certification" value="1" class="mt-1 text-primary focus:ring-primary rounded" {{ old('information_certification') ? 'checked' : '' }} required/>
                        <span class="text-sm text-slate-700 dark:text-slate-300">I certify that the information provided in this application is true and complete to the best of my knowledge.</span>
                    </label>
                    <div class="grid md:grid-cols-2 gap-6 pt-2">
                        <div class="space-y-2">
                            <label class="{{ $labelClass }}" for="applicant_signature">Applicant Signature</label>
                            <input class="{{ $inputClass }}" id="applicant_signature" type="text" name="applicant_signature" value="{{ old('applicant_signature') }}" placeholder="Type your full legal name" required/>
                        </div>
                        <div class="space-y-2">
                            <label class="{{ $labelClass }}" for="application_date">Date</label>
                            <input class="{{ $inputClass }}" id="application_date" type="date" name="application_date" value="{{ old('application_date', date('Y-m-d')) }}" required/>
                        </div>
                    </div>
                </div>
            </fieldset>

            {{-- Required Documents --}}
            <fieldset class="{{ $sectionClass }}">
                <legend class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined" aria-hidden="true">upload_file</span>
                    </span>
                    Required Documents
                </legend>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Accepted formats: PDF, JPG, or PNG (max 5 MB per file).</p>
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="drivers_license">Valid Driver's License <span class="text-red-500">*</span></label>
                        <input class="{{ $inputClass }} file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-slate-900 file:font-semibold file:cursor-pointer" id="drivers_license" type="file" name="drivers_license" accept=".pdf,.jpg,.jpeg,.png" required/>
                    </div>
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="vehicle_registration">Vehicle Registration <span class="text-red-500">*</span></label>
                        <input class="{{ $inputClass }} file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-slate-900 file:font-semibold file:cursor-pointer" id="vehicle_registration" type="file" name="vehicle_registration" accept=".pdf,.jpg,.jpeg,.png" required/>
                    </div>
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="auto_insurance">Proof of Auto Insurance <span class="text-red-500">*</span></label>
                        <input class="{{ $inputClass }} file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-slate-900 file:font-semibold file:cursor-pointer" id="auto_insurance" type="file" name="auto_insurance" accept=".pdf,.jpg,.jpeg,.png" required/>
                    </div>
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="vehicle_photos">Vehicle Photos (Front, Side, and Interior) <span class="text-red-500">*</span></label>
                        <input class="{{ $inputClass }} file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-slate-900 file:font-semibold file:cursor-pointer" id="vehicle_photos" type="file" name="vehicle_photos[]" accept=".jpg,.jpeg,.png" multiple required/>
                        <p class="text-xs text-slate-500">Upload up to 5 photos showing the front, side, and interior of your vehicle.</p>
                    </div>
                    <div class="space-y-2">
                        <label class="{{ $labelClass }}" for="resume">Resume <span class="text-slate-400">(Optional)</span></label>
                        <input class="{{ $inputClass }} file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-slate-900 file:font-semibold file:cursor-pointer" id="resume" type="file" name="resume" accept=".pdf,.doc,.docx"/>
                    </div>
                </div>
            </fieldset>

            <div class="pt-4">
                <button id="submit-application-btn" class="w-full bg-primary text-slate-900 py-4 rounded-xl text-lg font-bold hover:shadow-lg hover:shadow-primary/20 transition-all disabled:opacity-70 disabled:cursor-not-allowed" type="submit">
                    <span id="submit-application-label">Submit Application</span>
                    <span id="submit-application-loading" class="hidden inline-flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined animate-spin text-xl" aria-hidden="true">progress_activity</span>
                        Submitting…
                    </span>
                </button>
                <p class="text-center text-sm text-slate-500 mt-4">
                    <a href="{{ route('careers') }}" class="text-primary hover:underline">Back to Careers</a>
                </p>
            </div>
        </form>
        @endunless
    </div>
</section>

<x-footer />

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contractor-application-form');
    const submitBtn = document.getElementById('submit-application-btn');
    const submitLabel = document.getElementById('submit-application-label');
    const submitLoading = document.getElementById('submit-application-loading');

    if (form && submitBtn) {
        form.addEventListener('submit', () => {
            submitBtn.disabled = true;
            submitLabel.classList.add('hidden');
            submitLoading.classList.remove('hidden');
        });
    }

    document.querySelectorAll('[data-toggle-target]').forEach(radio => {
        radio.addEventListener('change', () => {
            const targetId = radio.dataset.toggleTarget;
            const target = document.getElementById(targetId);
            if (!target) return;

            const groupName = radio.name;
            const selected = document.querySelector(`input[name="${groupName}"]:checked`);
            const showDetails = selected && selected.value === '1';

            target.classList.toggle('hidden', !showDetails);
            const textarea = target.querySelector('textarea');
            if (textarea) {
                textarea.required = showDetails;
            }
        });
    });
});
</script>
@endsection
