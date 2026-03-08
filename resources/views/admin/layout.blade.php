@php
    $siteName = \App\Models\Setting::get('site.name', 'ClensMedix Courier LLC');
@endphp
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | {{ $siteName }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950 text-slate-100">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-slate-900 border-r border-slate-800 hidden md:flex flex-col">
            @php
                $configuredLogo = \App\Models\Setting::get('site.logo_path');
                $logoUrl = $configuredLogo ? asset($configuredLogo) : asset('images/logo.png');
            @endphp
            <div class="px-6 py-5 border-b border-slate-800 flex items-center gap-3">
                <img src="{{ $logoUrl }}" alt="Logo" class="h-8 w-auto">
                <div>
                    <p class="font-bold text-sm uppercase tracking-[0.2em] text-slate-500">Admin</p>
                    <p class="text-sm font-semibold text-slate-100">{{ $siteName }}</p>
                </div>
            </div>
            <nav class="flex-1 px-4 py-4 space-y-1 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-800 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-white' : 'text-slate-300' }}">
                    <span class="material-symbols-outlined text-base">dashboard</span>
                    Dashboard
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-800 {{ request()->routeIs('admin.settings.*') ? 'bg-slate-800 text-white' : 'text-slate-300' }}">
                    <span class="material-symbols-outlined text-base">settings</span>
                    Settings
                </a>
                <a href="{{ route('admin.content.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-800 {{ request()->routeIs('admin.content.*') ? 'bg-slate-800 text-white' : 'text-slate-300' }}">
                    <span class="material-symbols-outlined text-base">edit_note</span>
                    Content
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-800 {{ request()->routeIs('admin.services.*') ? 'bg-slate-800 text-white' : 'text-slate-300' }}">
                    <span class="material-symbols-outlined text-base">inventory_2</span>
                    Services
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-800 {{ request()->routeIs('admin.contacts.*') ? 'bg-slate-800 text-white' : 'text-slate-300' }}">
                    <span class="material-symbols-outlined text-base">mail</span>
                    Contact Forms
                </a>
            </nav>
            <form action="{{ route('admin.logout') }}" method="POST" class="px-4 pb-4 mt-auto">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-sm bg-slate-800 hover:bg-slate-700 text-slate-100">
                    <span class="material-symbols-outlined text-base">logout</span>
                    Logout
                </button>
            </form>
        </aside>
        <main class="flex-1 min-w-0 bg-slate-950">
            <header class="md:hidden px-4 py-3 border-b border-slate-800 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <img src="{{ $logoUrl }}" alt="Logo" class="h-8 w-auto">
                    <span class="font-semibold text-sm">{{ $siteName }} Admin</span>
                </div>
            </header>
            <div class="max-w-5xl mx-auto px-4 py-8">
                @if (session('success'))
                    <div class="mb-6 rounded-xl border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-rose-500/40 bg-rose-500/10 px-4 py-3 text-sm text-rose-100">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>

