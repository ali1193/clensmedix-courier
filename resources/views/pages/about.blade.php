@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative w-full h-[500px] flex items-center justify-center overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Modern medical courier delivery van on city street" style="background-image: linear-gradient(rgba(18, 32, 31, 0.7), rgba(18, 32, 31, 0.7)), url('https://lh3.googleusercontent.com/aida-public/AB6AXuAWh5Ba86x6ZJjvMc3Z5xHZne2SHZaNHWQltijvhgseVdXKjFQ-IwoduEunfg4CMOPGNTUQ0bp_T94nSTuKfnrsLy6wrDmwUcTZo7IAM0H0xqEdRPJO0-ZmD9RURultYZTp3poGS1rC616SNSrcBywjN7ALZH1oRvCUXdZ9k-VcRlg_MLjV6p3QJOXj6ynadKWZBi1YBwbsHepPNIWU0R7vrDwqqqXFGUzxftqJ5iNEOI6O0ESxLbEwl5axC7209JWc2clKzBbY86s');"></div>
<div class="relative z-10 text-center px-6 max-w-4xl">
<h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight leading-tight">About ClensMedix Courier</h1>
<p class="text-lg md:text-xl text-slate-200 font-medium max-w-2xl mx-auto">
                Trusted medical courier services delivering healthcare logistics with precision, reliability, and care.
            </p>
<div class="mt-8">
<a class="bg-primary text-background-dark px-8 py-4 rounded-lg font-bold text-lg hover:bg-primary/90 transition-all inline-block" href="#who-we-are">Learn More</a>
</div>
</div>
</section>
<!-- Company Introduction -->
<section class="py-20 px-6 lg:px-20 max-w-7xl mx-auto" id="who-we-are">
<div class="grid md:grid-cols-2 gap-12 items-center">
<div class="rounded-2xl overflow-hidden shadow-2xl">
<img alt="Professional medical courier handling sensitive delivery" class="w-full h-[450px] object-cover" data-alt="Healthcare professional handing over medical sample package" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0_kbgrObheWYS8Qx-DJhk7oQ9Qy21vA1ixUGqrOePcji48UlDh-Bf-JF2iu_nKPUgGe86B5d_OlHpOgDHoMvqR6qO3VYY54fFq6zVOG8dfe_NKdSXZnugBofkolLCXeQGl07WtcEdNTWT-Yxma3IldND5MIDfq0xvIyMFwHV5IA9BNlI8cHDpf7LXtMZCvNOpBaE9Iwcq8jA6KNOyV2Y_X5rtcbchjgLki2oSkk62suDDAqUnD8rVLk9U6HnEz551xneCF6Quzdo"/>
</div>
<div class="flex flex-col gap-6">
<span class="text-primary font-bold tracking-widest uppercase text-sm">Professional Logistics</span>
<h2 class="text-3xl md:text-4xl font-bold leading-tight">Who We Are</h2>
<p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed">
                    ClensMedix Courier LLC is a specialized medical courier service dedicated to providing reliable and secure transportation for healthcare facilities. We partner with hospitals, laboratories, pharmacies, and clinics to ensure critical medical deliveries arrive safely and on time.
                </p>
<p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed">
                    Our mission is to support healthcare providers with dependable courier solutions that prioritize speed, accuracy, and compliance with medical transport standards. We understand the weight of every package we carry.
                </p>
</div>
</div>
</section>
<!-- Mission & Vision Cards -->
<section class="bg-slate-100 dark:bg-slate-900/50 py-20 px-6 lg:px-20">
<div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-8">
<div class="bg-white dark:bg-background-dark p-10 rounded-2xl border border-primary/10 shadow-xl">
<div class="w-12 h-12 bg-primary/20 text-primary rounded-xl flex items-center justify-center mb-6">
<span class="material-symbols-outlined font-bold">flag</span>
</div>
<h3 class="text-2xl font-bold mb-4">Our Mission</h3>
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                    To provide fast, secure, and reliable medical courier services that healthcare providers can depend on. We strive to ensure every delivery meets the highest standards of safety, efficiency, and professionalism.
                </p>
</div>
<div class="bg-white dark:bg-background-dark p-10 rounded-2xl border border-primary/10 shadow-xl">
<div class="w-12 h-12 bg-primary/20 text-primary rounded-xl flex items-center justify-center mb-6">
<span class="material-symbols-outlined font-bold">visibility</span>
</div>
<h3 class="text-2xl font-bold mb-4">Our Vision</h3>
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                    To become a trusted medical logistics partner known for dependable delivery services, advanced tracking, and outstanding customer support within the healthcare community.
                </p>
</div>
</div>
</section>
<!-- Why ClensMedix Grid -->
<section class="py-24 px-6 lg:px-20 max-w-7xl mx-auto">
<div class="text-center mb-16">
<h2 class="text-3xl md:text-4xl font-bold mb-4">Why Choose ClensMedix</h2>
<div class="h-1.5 w-24 bg-primary mx-auto rounded-full"></div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
<div class="group p-8 rounded-xl bg-background-light dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary transition-all text-center">
<span class="material-symbols-outlined text-4xl text-primary mb-4">verified</span>
<h4 class="text-xl font-bold mb-2">Reliable Deliveries</h4>
<p class="text-sm text-slate-500">Dependable transport for critical healthcare items.</p>
</div>
<div class="group p-8 rounded-xl bg-background-light dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary transition-all text-center">
<span class="material-symbols-outlined text-4xl text-primary mb-4">thermostat</span>
<h4 class="text-xl font-bold mb-2">Temperature Controlled</h4>
<p class="text-sm text-slate-500">Specially maintained environments for sensitive cargo.</p>
</div>
<div class="group p-8 rounded-xl bg-background-light dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary transition-all text-center">
<span class="material-symbols-outlined text-4xl text-primary mb-4">schedule</span>
<h4 class="text-xl font-bold mb-2">Same Day Services</h4>
<p class="text-sm text-slate-500">Urgent medical courier solutions when time is vital.</p>
</div>
<div class="group p-8 rounded-xl bg-background-light dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary transition-all text-center">
<span class="material-symbols-outlined text-4xl text-primary mb-4">badge</span>
<h4 class="text-xl font-bold mb-2">Professional Drivers</h4>
<p class="text-sm text-slate-500">Trained personnel compliant with medical standards.</p>
</div>
<div class="group p-8 rounded-xl bg-background-light dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary transition-all text-center">
<span class="material-symbols-outlined text-4xl text-primary mb-4">location_on</span>
<h4 class="text-xl font-bold mb-2">Delivery Tracking</h4>
<p class="text-sm text-slate-500">Real-time monitoring and delivery confirmations.</p>
</div>
<div class="group p-8 rounded-xl bg-background-light dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary transition-all text-center">
<span class="material-symbols-outlined text-4xl text-primary mb-4">payments</span>
<h4 class="text-xl font-bold mb-2">Competitive Pricing</h4>
<p class="text-sm text-slate-500">High-quality services at cost-effective rates.</p>
</div>
</div>
</section>
<!-- Service Commitment -->
<section class="bg-primary py-16 px-6 lg:px-20 text-center text-background-dark">
<div class="max-w-4xl mx-auto">
<h2 class="text-3xl md:text-4xl font-black mb-6">Our Commitment to Healthcare Logistics</h2>
<p class="text-lg md:text-xl font-medium opacity-90">
                We understand that medical deliveries are time-sensitive and critical to patient care. That is why ClensMedix Courier focuses on precision, reliability, and professional service to ensure every delivery arrives securely and on schedule.
            </p>
</div>
</section>
<!-- Service Areas & Map -->
<section class="py-24 px-6 lg:px-20 max-w-7xl mx-auto">
<div class="grid md:grid-cols-2 gap-16 items-center">
<div>
<h2 class="text-3xl font-bold mb-6">Where We Operate</h2>
<p class="text-lg text-slate-600 dark:text-slate-400 mb-8 leading-relaxed">
                    ClensMedix Courier proudly serves the healthcare community across: 
                    <span class="font-bold text-slate-900 dark:text-white">Katy, Cypress, Fulshear, and the Greater Houston Area.</span>
</p>
<ul class="space-y-4">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary">check_circle</span>
<span>Full Greater Houston Coverage</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary">check_circle</span>
<span>Specialized Suburb Routes</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary">check_circle</span>
<span>24/7 Availability for Key Partners</span>
</li>
</ul>
</div>
<div class="rounded-2xl overflow-hidden h-[400px] border-4 border-white dark:border-slate-800 shadow-2xl">
<img alt="ClensMedix courier van parked outside a medical facility" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAWh5Ba86x6ZJjvMc3Z5xHZne2SHZaNHWQltijvhgseVdXKjFQ-IwoduEunfg4CMOPGNTUQ0bp_T94nSTuKfnrsLy6wrDmwUcTZo7IAM0H0xqEdRPJO0-ZmD9RURultYZTp3poGS1rC616SNSrcBywjN7ALZH1oRvCUXdZ9k-VcRlg_MLjV6p3QJOXj6ynadKWZBi1YBwbsHepPNIWU0R7vrDwqqqXFGUzxftqJ5iNEOI6O0ESxLbEwl5axC7209JWc2clKzBbY86s">
</div>
</div>
</section>
<!-- Call to Action -->
<section class="py-20 bg-background-dark text-white px-6">
<div class="max-w-4xl mx-auto text-center">
<h2 class="text-4xl font-black mb-8">Need a Reliable Medical Courier Partner?</h2>
<div class="flex flex-col sm:flex-row gap-4 justify-center">
<a class="bg-primary text-background-dark px-10 py-4 rounded-lg font-bold text-lg hover:scale-105 transition-transform flex items-center justify-center gap-2" href="tel:832-466-1443">
<span class="material-symbols-outlined">call</span>
                    Call 832-466-1443
                </a>
<a class="border-2 border-primary text-primary px-10 py-4 rounded-lg font-bold text-lg hover:bg-primary/10 transition-colors flex items-center justify-center gap-2" href="{{ route('contact') }}#request-pickup">
<span class="material-symbols-outlined">send</span>
                    Request a Pickup
                </a>
</div>
</div>
</section>
<x-footer />
@endsection
