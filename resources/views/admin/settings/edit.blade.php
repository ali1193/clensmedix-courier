@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold text-white mb-6">Settings</h1>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <section class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 space-y-4">
            <h2 class="text-sm font-semibold text-slate-200">Site</h2>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">Site name</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">Logo (optional)</label>
                    <input type="file" name="site_logo" class="w-full text-xs text-slate-300">
                    <p class="text-[11px] text-slate-500">If not set, the default logo image will be used.</p>
                </div>
            </div>
        </section>

        <section class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 space-y-4">
            <h2 class="text-sm font-semibold text-slate-200">Contact</h2>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">Phone number</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">Email address</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
            </div>
        </section>

        <section class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 space-y-4">
            <h2 class="text-sm font-semibold text-slate-200">SMTP</h2>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">Host</label>
                    <input type="text" name="smtp_host" value="{{ old('smtp_host', $settings['smtp_host']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">Port</label>
                    <input type="number" name="smtp_port" value="{{ old('smtp_port', $settings['smtp_port']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">Username</label>
                    <input type="text" name="smtp_username" value="{{ old('smtp_username', $settings['smtp_username']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">Password</label>
                    <input type="password" name="smtp_password" value="{{ old('smtp_password', $settings['smtp_password']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">Encryption (ssl/tls)</label>
                    <input type="text" name="smtp_encryption" value="{{ old('smtp_encryption', $settings['smtp_encryption']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">From email</label>
                    <input type="email" name="smtp_from_email" value="{{ old('smtp_from_email', $settings['smtp_from_email']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="space-y-1.5">
                    <label class="font-semibold text-slate-200">From name</label>
                    <input type="text" name="smtp_from_name" value="{{ old('smtp_from_name', $settings['smtp_from_name']) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
            </div>
        </section>

        <button type="submit" class="bg-primary text-background-dark font-semibold text-sm rounded-lg px-6 py-2.5 hover:brightness-110 transition">
            Save settings
        </button>
    </form>
@endsection

