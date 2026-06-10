@extends('layouts.app')

@section('content')
<div class="bg-slate-50 dark:bg-slate-900/30 border-b border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex items-center gap-2 text-sm font-medium" aria-label="Breadcrumb">
            <a class="text-slate-500 hover:text-primary transition-colors" href="{{ route('home') }}">Home</a>
            <span class="material-symbols-outlined text-slate-300 dark:text-slate-600 text-xs" aria-hidden="true">chevron_right</span>
            <span class="text-primary">Careers</span>
        </nav>
    </div>
</div>

<section class="relative py-20 lg:py-32 overflow-hidden bg-slate-50 dark:bg-slate-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-black text-slate-900 dark:text-white leading-[1.1] mb-6">
                    Join the <span class="text-primary">Clensmedix</span> Team
                </h1>
                <p class="text-xl md:text-2xl font-semibold text-slate-700 dark:text-slate-300 mb-4">
                    Flexible Independent Contractor Opportunities
                </p>
                <p class="text-lg md:text-xl text-slate-600 dark:text-slate-400 leading-relaxed mb-8">
                    Clensmedix is seeking reliable independent contractors to support our medical courier and delivery services. Join a professional healthcare logistics team committed to precision, safety, and dependable service across Texas.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a class="bg-primary text-slate-900 px-8 py-4 rounded-xl text-base font-bold hover:scale-[1.02] transition-transform inline-block" href="#job-opportunities">
                        View Opportunities
                    </a>
                    <a class="border-2 border-slate-200 dark:border-slate-700 px-8 py-4 rounded-xl text-base font-bold hover:bg-white dark:hover:bg-slate-800 transition-colors inline-block" href="{{ route('careers.apply') }}">
                        Apply Now
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-video lg:aspect-square rounded-3xl overflow-hidden shadow-2xl border-8 border-white dark:border-slate-800 bg-primary/5">
                    <img alt="Medical courier professional delivering healthcare packages" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAWh5Ba86x6ZJjvMc3Z5xHZne2SHZaNHWQltijvhgseVdXKjFQ-IwoduEunfg4CMOPGNTUQ0bp_T94nSTuKfnrsLy6wrDmwUcTZo7IAM0H0xqEdRPJO0-ZmD9RURultYZTp3poGS1rC616SNSrcBywjN7ALZH1oRvCUXdZ9k-VcRlg_MLjV6p3QJOXj6ynadKWZBi1YBwbsHepPNIWU0R7vrDwqqqXFGUzxftqJ5iNEOI6O0ESxLbEwl5axC7209JWc2clKzBbY86s"/>
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-xl hidden md:block">
                    <div class="flex items-center gap-4">
                        <div class="bg-primary/20 p-3 rounded-full text-primary">
                            <span class="material-symbols-outlined" aria-hidden="true">local_shipping</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Healthcare Logistics</p>
                            <p class="text-xs text-slate-500">Independent Contractor Roles</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white dark:bg-background-dark" id="job-opportunities">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white mb-4">Job Opportunities</h2>
            <div class="h-1.5 w-24 bg-primary mx-auto rounded-full"></div>
        </div>

        <div class="max-w-3xl mx-auto">
            <article class="group p-8 md:p-10 rounded-2xl border border-slate-100 dark:border-slate-800 bg-background-light dark:bg-slate-900/50 hover:border-primary transition-colors shadow-lg">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0 group-hover:bg-primary group-hover:text-slate-900 transition-colors">
                        <span class="material-symbols-outlined text-3xl" aria-hidden="true">delivery_dining</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Independent Contractor &mdash; Medical Courier</h3>
                        <p class="text-slate-600 dark:text-slate-400">Support critical healthcare deliveries across our service network.</p>
                    </div>
                </div>

                <ul class="space-y-3 mb-8" role="list">
                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="material-symbols-outlined text-primary text-xl" aria-hidden="true">check_circle</span>
                        Flexible schedule
                    </li>
                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="material-symbols-outlined text-primary text-xl" aria-hidden="true">check_circle</span>
                        Competitive compensation
                    </li>
                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="material-symbols-outlined text-primary text-xl" aria-hidden="true">check_circle</span>
                        Independent contractor opportunity
                    </li>
                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="material-symbols-outlined text-primary text-xl" aria-hidden="true">check_circle</span>
                        Medical specimen and healthcare-related deliveries
                    </li>
                    <li class="flex items-center gap-3 text-slate-700 dark:text-slate-300">
                        <span class="material-symbols-outlined text-primary text-xl" aria-hidden="true">check_circle</span>
                        Multiple service areas available
                    </li>
                </ul>

                <a href="{{ route('careers.apply') }}" class="inline-flex items-center justify-center gap-2 w-full sm:w-auto bg-primary text-slate-900 px-8 py-4 rounded-xl text-base font-bold hover:shadow-lg hover:shadow-primary/20 hover:scale-[1.02] transition-all">
                    Become an Independent Contractor With Us
                    <span class="material-symbols-outlined text-xl" aria-hidden="true">arrow_forward</span>
                </a>
            </article>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-50 dark:bg-slate-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white dark:bg-slate-800 p-8 md:p-12 rounded-3xl border border-slate-100 dark:border-slate-700 shadow-xl relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-10">
                    <span class="material-symbols-outlined text-8xl" aria-hidden="true">groups</span>
                </div>
                <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                    <div class="bg-primary/20 p-6 rounded-2xl text-primary">
                        <span class="material-symbols-outlined text-4xl" aria-hidden="true">handshake</span>
                    </div>
                    <div class="text-center md:text-left">
                        <h2 class="text-2xl font-black text-slate-900 dark:text-white mb-2">Why Drive With Clensmedix?</h2>
                        <p class="text-slate-600 dark:text-slate-400 text-lg">Partner with a trusted medical logistics provider serving healthcare facilities across Texas with professionalism and care.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<x-footer />
@endsection
