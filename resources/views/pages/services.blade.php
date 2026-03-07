@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative w-full h-[600px] flex items-center overflow-hidden">
<div class="absolute inset-0 z-0">
<img class="w-full h-full object-cover" data-alt="Professional medical courier driver with a white delivery van" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBqXq44nm7NqsfPvHw8kyEac8k_3QzdyfR-FuYGbiPuMAcPXFmMvtVAISXxvcBLwBL2rQ5lrmRrJvZC6L_hsG8NDSAC4rR_ksGUex_x_f0ey1W5e2scjpHptxH2FVdfXUX0StxC5BV0zZIpVMl-kATz1Q5RWnmMH67XmeAKKZE_dpQr4tVzmA27FKiUSMODSg5Hd3GoPOkjuRHvnn541d3_hndDp57EGcKo8zgK7JxIwSzVNN3mzUzSTmp99yyP7_c6C6ccb4nXgQo"/>
<div class="absolute inset-0 bg-gradient-to-r from-background-dark/90 via-background-dark/60 to-transparent"></div>
</div>
<div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
<div class="max-w-2xl">
<h1 class="text-5xl md:text-7xl font-black text-white leading-tight mb-6">
                    Medical Courier <span class="text-primary">Services</span>
</h1>
<p class="text-xl text-slate-200 mb-8 font-medium leading-relaxed">
                    Professional, secure, and time-critical medical deliveries you can rely on. Ensuring the integrity of every shipment.
                </p>
<div class="flex flex-wrap gap-4">
<a class="bg-primary text-background-dark px-8 py-4 rounded-xl font-bold text-lg hover:shadow-lg hover:shadow-primary/20 transition-all inline-block" href="{{ route('contact') }}#request-pickup">
                        Get Started
                    </a>
<a class="bg-white/10 backdrop-blur-md border border-white/20 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/20 transition-all inline-block" href="#services-grid">
                        Learn More
                    </a>
<a class="bg-white/10 backdrop-blur-md border border-white/20 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/20 transition-all inline-block" href="{{ route('contact') }}#request-pickup">Get Quote</a></div>
</div>
</div>
</section>
<!-- Medical Specimen Transport -->
<section class="py-24 bg-white dark:bg-background-dark" id="specimen">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid lg:grid-cols-2 gap-16 items-center">
<div class="relative group">
<div class="absolute -inset-4 bg-primary/20 rounded-2xl blur-xl transition-all group-hover:bg-primary/30"></div>
<img class="relative rounded-2xl shadow-2xl w-full object-cover aspect-[4/3]" data-alt="Laboratory sample containers and medical test tubes" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCxdABAcTkFSh1poK544sPsjJx9XQGepr_hE1H4RuP2Z4cOzKmsN5NvQlWo274irab8MOsIGQEEE1WLWR89F42H1TzkC2fImeQIuwTgmvailSnuuesdCujE0ADIsRD_wRA9q0KEVY_LCdnH_eggnlozGh6YjOuhgcVpCDd75RvY1NXiVD0zkbYdcdrCDgUJKA6-lzzJ_ecpZKjYsNLl4h-hlM2tJehWNwsv3ZIIqcufE_lP0DvamgCs_1m6BG3THJOoroJtjs4S_1E"/>
</div>
<div class="space-y-6">
<span class="text-primary font-bold tracking-widest uppercase text-sm">Laboratory Logistics</span>
<h2 class="text-4xl font-black text-slate-900 dark:text-white">Medical Specimen Transport</h2>
<p class="text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                        We provide secure transportation for laboratory specimens and medical samples, ensuring clinical integrity and safety throughout the entire delivery process. Our drivers are trained in OSHA and HIPAA compliance.
                    </p>
<ul class="space-y-4">
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary">check_circle</span>
<span class="font-medium">Bio-hazard containment standards</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary">check_circle</span>
<span class="font-medium">Chain of custody documentation</span>
</li>
<li class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary">check_circle</span>
<span class="font-medium">Stat and scheduled routes available</span>
</li>
</ul>
</div>
</div>
</div>
</section>
<!-- Pharmaceutical Delivery -->
<section class="py-24 bg-background-light dark:bg-slate-900/50" id="pharmacy">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid lg:grid-cols-2 gap-16 items-center">
<div class="order-2 lg:order-1 space-y-6">
<span class="text-primary font-bold tracking-widest uppercase text-sm">Pharmacy Solutions</span>
<h2 class="text-4xl font-black text-slate-900 dark:text-white">Pharmaceutical Delivery</h2>
<p class="text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                        Reliable delivery for pharmaceutical products with full healthcare compliance and real-time tracking. We partner with pharmacies and hospitals to ensure patients receive their medications on time, every time.
                    </p>
<div class="bg-white dark:bg-background-dark p-6 rounded-xl border border-primary/20">
<p class="italic text-slate-700 dark:text-slate-300">"Our commitment is to bridge the gap between healthcare providers and patients through excellence in logistics."</p>
</div>
</div>
<div class="order-1 lg:order-2 relative group">
<div class="absolute -inset-4 bg-primary/20 rounded-2xl blur-xl transition-all group-hover:bg-primary/30"></div>
<img class="relative rounded-2xl shadow-2xl w-full object-cover aspect-[4/3]" data-alt="Sealed pharmaceutical packages and medicine bottles" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBL93OKSfjUiyzsk9hMNxHcViCMhg6ZVEM6d3EEWs2sPpzJEc4jjeQNtlipOICLKOrlPOoOrVdMu_pYhvQCreroSCEinxMc1c8FV4vviGa5GvG1q_sV_3baYbkHIGfjr0jFDSRKh3V7yoo8NuEJG2LBAPA-dZgBkXkgmrxWh0EAecELPQ5O9V_OKG5ioI9R37JOTUjLcSEA4of9sRPeWJrGSdVjvsRwbrJJGDqfy48UxkaUVtrXwzwPusLDpQhEp4-CuEv5ShWwots"/>
</div>
</div>
</div>
</section>
<!-- Services Grid Section -->
<section class="py-24 bg-white dark:bg-background-dark" id="services-grid">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-16">
<h2 class="text-4xl font-black text-slate-900 dark:text-white mb-4">Our Specialized Services</h2>
<p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-lg">Comprehensive medical logistics tailored to the unique needs of the healthcare industry.</p>
</div>
<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Card 1 -->
<div class="group bg-background-light dark:bg-slate-900 rounded-2xl overflow-hidden border border-transparent hover:border-primary transition-all flex flex-col">
<img class="h-48 w-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Hospital equipment transport in a clinical setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAODUZZ1CYaVHqyovJH5UC4yKUfE-rHroSZtaGWRq2Mx6veP81Qm5EpHEulaEgewRJodDWfjm9-3GSamEhq2AUUIKwPKhhwvkooN7lijcYUc2naOwpOlupTJ2VpIbnUCrEmBoPNnhLMzOl2HxJ99lERCvOwkiDQomMJHvb8lgNhR-J9IE78tibKkxJJG8j3r5CYelY3zUbwNUApM3R1p2RSb7urN6mX3LVQOOL8cIR7hhi6qCLmegovc5-csTz9RGVUnFG6LZrEE3c"/>
<div class="p-6 flex flex-col grow">
<h3 class="text-xl font-bold mb-2">Medical Equipment Delivery</h3>
<p class="text-sm text-slate-600 dark:text-slate-400 grow">Safe transit for sensitive diagnostics and surgical tools.</p>
</div>
</div>
<!-- Card 2 -->
<div class="group bg-background-light dark:bg-slate-900 rounded-2xl overflow-hidden border border-transparent hover:border-primary transition-all flex flex-col">
<img class="h-48 w-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Blue medical cooler box for temperature transport" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGFMoJJkY_UaVbsmBcdMgn09YUJAb65V5M8INbpEOj8bAjR5AYvTycergZIBgP6p3bYAyKVJvJajA-fcLalgsxiun8Qp9EcpQwII90FZrlLr4U8swA89Gjq9A_EFfr2PXq1YeK5r_NW1zgXixFwSxqDssZbxuGHhqkm-CDBwo3pA48fE9aAuGhmt3a5zPkZx-mvGnbY8r-clnRR3D0RTelai0gdEZemB0OPWz6FQFMV8eGVotg6JMHStwZ5QjtWjWr9NxpNZzZAEY"/>
<div class="p-6 flex flex-col grow">
<h3 class="text-xl font-bold mb-2">Temperature Controlled</h3>
<p class="text-sm text-slate-600 dark:text-slate-400 grow">Validated cold chain solutions for temperature-sensitive cargo.</p>
</div>
</div>
<!-- Card 3 -->
<div class="group bg-background-light dark:bg-slate-900 rounded-2xl overflow-hidden border border-transparent hover:border-primary transition-all flex flex-col">
<img class="h-48 w-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Urgent delivery package being handed over" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjNQCvtLvS0JmzCdpLqgddSS4BvAezdHRJJLTA1Dso9Gr6Cn_kRyLH_6ZFidmR-yve6P7i8yomMBrdblRrplbPJmQmnYAfL_Yb5uhv8SPBauvpreO_8yP7T1MOf0ykUf89lcLMg4pCcsdY6QgNE6R97immXYvL34s72NXsuHhY2DF2ajRlBlAziEEciEZu0tmVDbODuVkLZEcK39Ms3nJQZXQ4qhe79Prtf1Cc_M7Q1o63Ud3nEo5Gb4mJwXb5dBPkzJ6Jf-UsihM"/>
<div class="p-6 flex flex-col grow">
<h3 class="text-xl font-bold mb-2">Same Day Medical</h3>
<p class="text-sm text-slate-600 dark:text-slate-400 grow">Expedited urgent deliveries for time-critical medical needs.</p>
</div>
</div>
<!-- Card 4 -->
<div class="group bg-background-light dark:bg-slate-900 rounded-2xl overflow-hidden border border-transparent hover:border-primary transition-all flex flex-col">
<img class="h-48 w-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Medical van loading packages at a facility" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCqMxbpNiAhAybvHxL3bmYsNGKIUHNHqEtN-sQfThDPZ0KcmrC5VtOK2ysS0aWEx3WI-ELFMnzkQUyhroMQFvvfOnUY4pNH_nTy-AFObSr-kZmj_43TRXyc4xBquStSpMRX8NEAjs7VMeHFs_lmgpvz1bFBRjR5EM2AswXIL3mizBd7v07eIrSW6GegH2Hy9xBOzgpJ4q7JaadXf7c1eZAtaw9ukMLbP9qegY-bt6ZJruv1zOaRqOqXY1XLIdHAx8T-cLPQPWcdXOE"/>
<div class="p-6 flex flex-col grow">
<h3 class="text-xl font-bold mb-2">Scheduled Logistics</h3>
<p class="text-sm text-slate-600 dark:text-slate-400 grow">Reliable daily or weekly routes for medical networks.</p>
</div>
</div>
</div>
</div>
</section>
<!-- Why Choose ClensMedix -->
<section class="py-24 bg-background-light dark:bg-slate-900/50">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-16">
<h2 class="text-4xl font-black text-slate-900 dark:text-white mb-4">Why Choose ClensMedix?</h2>
<p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">Industry-leading standards and a commitment to medical excellence.</p>
</div>
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-12">
<div class="flex gap-4">
<div class="flex-shrink-0 w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-primary font-bold">verified</span>
</div>
<div>
<h4 class="text-lg font-bold mb-2">Reliable Delivery</h4>
<p class="text-slate-600 dark:text-slate-400 text-sm">Consistent on-time performance for critical healthcare needs.</p>
</div>
</div>
<div class="flex gap-4">
<div class="flex-shrink-0 w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-primary font-bold">badge</span>
</div>
<div>
<h4 class="text-lg font-bold mb-2">Professional Drivers</h4>
<p class="text-slate-600 dark:text-slate-400 text-sm">Background-checked, HIPAA-certified, and uniformed professionals.</p>
</div>
</div>
<div class="flex gap-4">
<div class="flex-shrink-0 w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-primary font-bold">thermostat</span>
</div>
<div>
<h4 class="text-lg font-bold mb-2">Temp-Controlled</h4>
<p class="text-slate-600 dark:text-slate-400 text-sm">Specialized equipment for maintaining strict temperature ranges.</p>
</div>
</div>
<div class="flex gap-4">
<div class="flex-shrink-0 w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-primary font-bold">lock</span>
</div>
<div>
<h4 class="text-lg font-bold mb-2">Secure Handling</h4>
<p class="text-slate-600 dark:text-slate-400 text-sm">Rigorous security protocols for all sensitive medical items.</p>
</div>
</div>
<div class="flex gap-4">
<div class="flex-shrink-0 w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-primary font-bold">route</span>
</div>
<div>
<h4 class="text-lg font-bold mb-2">Delivery Tracking</h4>
<p class="text-slate-600 dark:text-slate-400 text-sm">Real-time GPS tracking and instant delivery notifications.</p>
</div>
</div>
<div class="flex gap-4">
<div class="flex-shrink-0 w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-primary font-bold">payments</span>
</div>
<div>
<h4 class="text-lg font-bold mb-2">Competitive Pricing</h4>
<p class="text-slate-600 dark:text-slate-400 text-sm">Cost-effective solutions without compromising on quality.</p>
</div>
</div>
</div>
</div>
</section>
<!-- Call to Action -->
<!-- FAQ Section -->
<section class="py-24 bg-background-light dark:bg-slate-900/50">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-16">
<h2 class="text-4xl font-black text-slate-900 dark:text-white mb-4">Client Testimonials</h2>
<p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-lg">Trusted by healthcare professionals and medical facilities across the state.</p>
</div>
<div class="grid md:grid-cols-3 gap-8">
<div class="bg-white dark:bg-background-dark p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 relative">
<span class="material-symbols-outlined text-primary text-5xl opacity-20 absolute top-4 right-4">format_quote</span>
<p class="text-slate-600 dark:text-slate-300 italic mb-6">"The team at ClensMedix is incredibly reliable. We've seen a significant reduction in transit times for our critical lab specimens since switching to their service."</p>
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center font-bold text-primary">SJ</div>
<div>
<p class="font-bold text-slate-900 dark:text-white">Sarah J.</p>
<p class="text-xs text-slate-500 uppercase font-semibold">Lab Manager, City General</p>
</div>
</div>
</div>
<div class="bg-white dark:bg-background-dark p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 relative">
<span class="material-symbols-outlined text-primary text-5xl opacity-20 absolute top-4 right-4">format_quote</span>
<p class="text-slate-600 dark:text-slate-300 italic mb-6">"Professionalism is key in medical logistics, and ClensMedix delivers. Their drivers are always courteous and strictly follow all compliance protocols."</p>
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center font-bold text-primary">MR</div>
<div>
<p class="font-bold text-slate-900 dark:text-white">Michael R.</p>
<p class="text-xs text-slate-500 uppercase font-semibold">Operations Director, BioTech Labs</p>
</div>
</div>
</div>
<div class="bg-white dark:bg-background-dark p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 relative">
<span class="material-symbols-outlined text-primary text-5xl opacity-20 absolute top-4 right-4">format_quote</span>
<p class="text-slate-600 dark:text-slate-300 italic mb-6">"Their temperature-controlled transport has been a game changer for our specialty pharmacy. We never have to worry about the integrity of our shipments."</p>
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center font-bold text-primary">EL</div>
<div>
<p class="font-bold text-slate-900 dark:text-white">Elena L.</p>
<p class="text-xs text-slate-500 uppercase font-semibold">Head Pharmacist, CarePlus</p>
</div>
</div>
</div>
</div>
</div>
</section><section class="py-24 bg-white dark:bg-background-dark">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-16">
<h2 class="text-4xl font-black text-slate-900 dark:text-white mb-4">Compliance &amp; Regulations FAQ</h2>
<p class="text-slate-600 dark:text-slate-400 text-lg">Everything you need to know about our medical transport standards and certifications.</p>
</div>
<div class="space-y-4">
<!-- FAQ Item 1 -->
<div class="border border-slate-200 dark:border-slate-800 rounded-2xl overflow-hidden">
<button type="button" class="w-full flex items-center justify-between p-6 text-left bg-background-light dark:bg-slate-900/50 hover:bg-slate-50 dark:hover:bg-slate-900 transition-colors group">
<span class="text-lg font-bold text-slate-900 dark:text-white">How do you ensure HIPAA compliance during transport?</span>
<span class="material-symbols-outlined text-primary group-hover:rotate-180 transition-transform">expand_more</span>
</button>
<div class="p-6 pt-0 bg-background-light dark:bg-slate-900/50">
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Our drivers are HIPAA-certified and trained in the secure handling of patient-identifiable information. We use chain-of-custody protocols and secure, unmarked transport to ensure complete privacy and compliance with federal regulations.
                    </p>
</div>
</div>
<!-- FAQ Item 2 -->
<div class="border border-slate-200 dark:border-slate-800 rounded-2xl overflow-hidden">
<button type="button" class="w-full flex items-center justify-between p-6 text-left bg-background-light dark:bg-slate-900/50 hover:bg-slate-50 dark:hover:bg-slate-900 transition-colors group">
<span class="text-lg font-bold text-slate-900 dark:text-white">What are your protocols for OSHA-regulated biohazardous materials?</span>
<span class="material-symbols-outlined text-primary group-hover:rotate-180 transition-transform">expand_more</span>
</button>
<div class="p-6 pt-0 bg-background-light dark:bg-slate-900/50">
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        We strictly adhere to OSHA Bloodborne Pathogen Standards. All medical specimens are transported in secondary leak-proof containers within specialized medical coolers, and our vehicles are equipped with spill kits and biohazard safety equipment.
                    </p>
</div>
</div>
<!-- FAQ Item 3 -->
<div class="border border-slate-200 dark:border-slate-800 rounded-2xl overflow-hidden">
<button type="button" class="w-full flex items-center justify-between p-6 text-left bg-background-light dark:bg-slate-900/50 hover:bg-slate-50 dark:hover:bg-slate-900 transition-colors group">
<span class="text-lg font-bold text-slate-900 dark:text-white">How is temperature-sensitive cargo monitored?</span>
<span class="material-symbols-outlined text-primary group-hover:rotate-180 transition-transform">expand_more</span>
</button>
<div class="p-6 pt-0 bg-background-light dark:bg-slate-900/50">
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        We utilize calibrated digital data loggers and specialized thermal packaging. Our temperature-controlled transport solutions are validated for refrigerated (2°C to 8°C), frozen, and ambient ranges, providing a continuous audit trail for sensitive pharmaceuticals and specimens.
                    </p>
</div>
</div>
<!-- FAQ Item 4 -->
<div class="border border-slate-200 dark:border-slate-800 rounded-2xl overflow-hidden">
<button type="button" class="w-full flex items-center justify-between p-6 text-left bg-background-light dark:bg-slate-900/50 hover:bg-slate-50 dark:hover:bg-slate-900 transition-colors group">
<span class="text-lg font-bold text-slate-900 dark:text-white">What certifications do your drivers hold?</span>
<span class="material-symbols-outlined text-primary group-hover:rotate-180 transition-transform">expand_more</span>
</button>
<div class="p-6 pt-0 bg-background-light dark:bg-slate-900/50">
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Every ClensMedix courier undergoes comprehensive training including HIPAA compliance, OSHA safety standards, Bloodborne Pathogen training, and specialized medical logistics handling. We also conduct thorough background checks and drug screenings.
                    </p>
</div>
</div>
<!-- FAQ Item 5 -->
<div class="border border-slate-200 dark:border-slate-800 rounded-2xl overflow-hidden">
<button type="button" class="w-full flex items-center justify-between p-6 text-left bg-background-light dark:bg-slate-900/50 hover:bg-slate-50 dark:hover:bg-slate-900 transition-colors group">
<span class="text-lg font-bold text-slate-900 dark:text-white">Do you provide chain-of-custody documentation?</span>
<span class="material-symbols-outlined text-primary group-hover:rotate-180 transition-transform">expand_more</span>
</button>
<div class="p-6 pt-0 bg-background-light dark:bg-slate-900/50">
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">Yes, we provide real-time digital chain-of-custody tracking. Every pickup and delivery is recorded with time stamps, location data, and electronic signatures.</p>
</div>
</div>
</div>
</div>
</section><section class="py-20">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="bg-primary rounded-[2rem] p-12 md:p-20 text-center relative overflow-hidden">
<div class="absolute inset-0 bg-white/5 opacity-50 pointer-events-none"></div>
<div class="relative z-10">
<h2 class="text-3xl md:text-5xl font-black text-background-dark mb-8">Need a Medical Courier Service Today?</h2>
<div class="flex flex-wrap justify-center gap-6">
<a class="bg-background-dark text-white px-10 py-4 rounded-xl font-black text-lg hover:scale-105 transition-transform inline-block" href="tel:832-466-1443">
                            Call 832-466-1443
                        </a>
<a class="bg-white text-background-dark px-10 py-4 rounded-xl font-black text-lg hover:scale-105 transition-transform shadow-xl inline-block" href="{{ route('contact') }}#request-pickup">
                            Request Pickup
                        </a>
<a class="bg-transparent border-2 border-background-dark text-background-dark px-10 py-4 rounded-xl font-black text-lg hover:bg-background-dark hover:text-white transition-all inline-block" href="{{ route('contact') }}#request-pickup">Get Quote</a></div>
</div>
</div>
</div>
</section>
<!-- Contact Section -->
<section class="py-24 bg-white dark:bg-background-dark">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid lg:grid-cols-2 gap-20">
<div class="space-y-8">
<div>
<h2 class="text-4xl font-black text-slate-900 dark:text-white mb-4">Contact Us</h2>
<p class="text-slate-600 dark:text-slate-400 text-lg">Reach out for custom quotes or service inquiries.</p>
</div>
<div class="space-y-6">
@php
    $servicesPhone = \App\Models\Setting::get('contact.phone', '832-466-1443');
    $servicesEmail = \App\Models\Setting::get('contact.email', 'info@clensmedix.com');
@endphp
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">call</span>
</div>
<div>
<p class="text-sm text-slate-500 font-medium">Call Us Anytime</p>
<p class="text-lg font-bold">{{ $servicesPhone }}</p>
</div>
</div>
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">mail</span>
</div>
<div>
<p class="text-sm text-slate-500 font-medium">Email Us</p>
<p class="text-lg font-bold">{{ $servicesEmail }}</p>
</div>
</div>
</div>
</div>
<div class="bg-background-light dark:bg-slate-900 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800">
@if (session('success'))
<div class="mb-6 rounded-xl border border-primary/30 bg-primary/10 p-4 text-sm font-semibold text-slate-900 dark:text-slate-100">
{{ session('success') }}
</div>
@endif
<form class="space-y-4" method="POST" action="{{ route('contact.submit') }}">
@csrf
<input type="hidden" name="source" value="services_page">
<div class="grid grid-cols-2 gap-4">
<div>
<label class="block text-xs font-bold uppercase text-slate-500 mb-1">Name</label>
<input class="w-full border bg-white dark:bg-background-dark border-slate-200 dark:border-slate-800 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="John Doe" type="text" name="name" required/>
</div>
<div>
<label class="block text-xs font-bold uppercase text-slate-500 mb-1">Phone</label>
<input class="w-full border bg-white dark:bg-background-dark border-slate-200 dark:border-slate-800 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="(000) 000-0000" type="tel" name="phone"/>
</div>
</div>
<div>
<label class="block text-xs font-bold uppercase text-slate-500 mb-1">Pickup Location</label>
<input class="w-full border bg-white dark:bg-background-dark border-slate-200 dark:border-slate-800 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="Street, City, State" type="text" name="pickup_location"/>
</div>
<div>
<label class="block text-xs font-bold uppercase text-slate-500 mb-1">Delivery Location</label>
<input class="w-full border bg-white dark:bg-background-dark border-slate-200 dark:border-slate-800 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="Street, City, State" type="text" name="delivery_location"/>
</div>
<div>
<label class="block text-xs font-bold uppercase text-slate-500 mb-1">Message</label>
<textarea class="w-full border bg-white dark:bg-background-dark border-slate-200 dark:border-slate-800 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="How can we help you?" rows="4" name="message"></textarea>
</div>
<button type="submit" class="w-full bg-primary text-background-dark font-black py-4 rounded-lg hover:bg-primary/90 transition-colors uppercase tracking-widest">
                            Send Message
                        </button>
</form>
</div>
</div>
</div>
</section>
<x-footer />
@endsection
