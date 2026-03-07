<!-- Hero Section -->
<section class="hero-section relative overflow-hidden pt-16 pb-24 px-6">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
        <div class="z-10">
            <div class="hero-badge inline-flex items-center gap-2 bg-primary/10 border border-primary/20 px-3 py-1 rounded-full text-primary text-xs font-bold uppercase tracking-wider mb-6">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                </span>
                Available 24/7 in Houston
            </div>
            <h1 class="hero-title text-5xl md:text-6xl font-black leading-tight tracking-tight mb-6">
                Reliable Medical Courier Services <span class="text-primary">You Can Trust.</span>
            </h1>
            <p class="hero-subtitle text-lg text-slate-600 dark:text-slate-400 mb-10 max-w-xl">
                Delivering Excellence, One Mile at a Time. Secure, temperature-controlled transport for critical healthcare needs, serving hospitals, labs, and pharmacies.
            </p>
            @php
                $heroPhone = \App\Models\Setting::get('contact.phone', '832-466-1443');
            @endphp
            <div class="hero-buttons flex flex-col sm:flex-row gap-4">
                <a class="bg-primary text-background-dark px-8 py-4 rounded-xl font-bold text-lg shadow-lg shadow-primary/20 hover:scale-105 transition-transform text-center" href="{{ route('contact') }}#request-pickup">Request a Pickup</a>
                <a class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-8 py-4 rounded-xl font-bold text-lg flex items-center justify-center gap-2 hover:bg-slate-50 transition-colors" href="tel:{{ preg_replace('/[^0-9]/', '', $heroPhone) }}">
                    <span class="material-symbols-outlined">call</span>
                    {{ $heroPhone }}
                </a>
            </div>
        </div>
        <div class="hero-image-wrapper relative">
            <div class="absolute inset-0 bg-primary/20 blur-[100px] -z-10 rounded-full"></div>
            <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-white dark:border-slate-800">
                <img class="hero-image w-full h-full object-cover aspect-[4/3]" alt="Professional medical courier driver standing by a white medical transport van" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBzvZjPnZ2Df8EyWf1xvP4UVR1SAfLJ6W6y1tlpJKgj_FAyyPhleFI_AEbbFNOOPghck4hxd5AOAagcPCd1j6AXjAtKRpANQDgXGQhsNcAftWBjGUTjxgyNzyT2R1EdMqfWd6U-FvRK_-TJ660QudYbD_GsyEnmpu6UeMFVJHl-FcuAMg_JyiWPQ80pvSGxM8E9is-rpyO2OTzN2pDyvuQxUCVRDFkyMYygEhoOUhduDRoxH-dQ4a2kQ9mkVxkrmhOfShtzi4uJGyg"/>
            </div>
        </div>
    </div>
</section>
