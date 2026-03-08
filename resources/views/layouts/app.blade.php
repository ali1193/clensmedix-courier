<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClensMedix Courier LLC | Reliable Medical Logistics</title>

    @php
        $configuredLogo = \App\Models\Setting::get('site.logo_path');
        $faviconPath = $configuredLogo ?: 'images/logo.png';
    @endphp
    <link rel="icon" href="{{ asset($faviconPath) }}" type="image/png">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 font-display">

    <!-- Header / Navigation -->
    <header class="sticky top-0 z-50 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-primary/10 px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            @php
                $configuredLogo = \App\Models\Setting::get('site.logo_path');
                $logoUrl = $configuredLogo ? asset($configuredLogo) : asset('images/logo.png');
            @endphp
            <div class="flex items-center gap-2">
                <img src="{{ $logoUrl }}" alt="ClensMedix Courier Logo" class="h-14 w-auto">
            </div>
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('home') ? 'text-primary' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('about') ? 'text-primary' : '' }}" href="{{ route('about') }}">About Us</a>
                <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('services') ? 'text-primary' : '' }}" href="{{ route('services') }}">Services</a>
                <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('contact') ? 'text-primary' : '' }}" href="{{ route('contact') }}">Contact</a>
            </nav>
            @php
                $globalPhone = \App\Models\Setting::get('contact.phone', '832-466-1443');
                $globalEmail = \App\Models\Setting::get('contact.email', 'Clensmedix@gmail.com');
            @endphp
            <div class="flex items-center gap-4">
                <a class="hidden lg:block text-sm font-bold text-slate-700 dark:text-slate-300 hover:text-primary transition-colors" href="tel:{{ preg_replace('/[^0-9]/', '', $globalPhone) }}">{{ $globalPhone }}</a>
                <a href="{{ route('contact') }}" class="hidden sm:block bg-primary text-background-dark px-5 py-2.5 rounded-lg font-bold text-sm hover:brightness-95 transition-all">Request a Pickup</a>
                <button id="mobile-menu-btn" type="button" class="md:hidden text-slate-900 dark:text-white p-2 focus:outline-none">
                    <span class="material-symbols-outlined text-3xl">menu</span>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white dark:bg-slate-900 border-b border-primary/10 shadow-2xl flex-col p-6 gap-6">
            <a class="text-lg font-semibold hover:text-primary transition-colors {{ request()->routeIs('home') ? 'text-primary' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="text-lg font-semibold hover:text-primary transition-colors {{ request()->routeIs('about') ? 'text-primary' : '' }}" href="{{ route('about') }}">About Us</a>
            <a class="text-lg font-semibold hover:text-primary transition-colors {{ request()->routeIs('services') ? 'text-primary' : '' }}" href="{{ route('services') }}">Services</a>
            <a class="text-lg font-semibold hover:text-primary transition-colors {{ request()->routeIs('contact') ? 'text-primary' : '' }}" href="{{ route('contact') }}">Contact</a>
            <div class="pt-4 border-t border-slate-200 dark:border-slate-800">
                <a href="{{ route('contact') }}" class="sm:hidden block w-full bg-primary text-background-dark px-5 py-3.5 rounded-lg font-bold text-center text-base hover:brightness-95 transition-all">Request a Pickup</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const icon = btn.querySelector('.material-symbols-outlined');

            btn.addEventListener('click', () => {
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                    menu.classList.add('flex');
                    icon.textContent = 'close';
                } else {
                    menu.classList.add('hidden');
                    menu.classList.remove('flex');
                    icon.textContent = 'menu';
                }
            });
        });
    </script>
</body>
</html>
