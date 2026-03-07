<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | ClensMedix</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center bg-slate-950 text-slate-100">
    <div class="w-full max-w-md px-6">
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl shadow-2xl p-8">
            <div class="flex flex-col items-center gap-2 mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="ClensMedix Logo" class="h-10 w-auto">
                <p class="text-xs uppercase tracking-[0.25em] text-slate-500 font-semibold">Admin Panel</p>
            </div>
            @if (session('error'))
                <div class="mb-4 rounded-lg border border-rose-500/40 bg-rose-500/10 px-3 py-2 text-xs text-rose-100">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.login.attempt') }}" class="space-y-5">
                @csrf
                <div class="space-y-1.5 text-sm">
                    <label class="font-semibold text-slate-200">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="space-y-1.5 text-sm">
                    <label class="font-semibold text-slate-200">Password</label>
                    <input type="password" name="password" required class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
                </div>
                <div class="flex items-center justify-between text-xs text-slate-400">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded border-slate-600 bg-slate-900 text-primary">
                        <span>Remember me</span>
                    </label>
                </div>
                <button type="submit" class="w-full bg-primary text-background-dark font-semibold text-sm rounded-lg py-2.5 hover:brightness-110 transition">
                    Sign in
                </button>
            </form>
        </div>
    </div>
</body>
</html>

