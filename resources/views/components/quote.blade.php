<!-- Contact Section -->
<section class="py-24 px-6 bg-background-light dark:bg-background-dark" id="contact">
<div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16">
<div>
<h2 class="text-4xl font-black mb-6">Get in Touch</h2>
<p class="text-slate-600 dark:text-slate-400 mb-12">Have questions about our rates or specialized service capabilities? Fill out the form and our logistics coordinator will contact you within 15 minutes.</p>
<div class="space-y-8">
@php
    $quotePhone = \App\Models\Setting::get('contact.phone', '832-466-1443');
    $quoteEmail = \App\Models\Setting::get('contact.email', 'Clensmedix@gmail.com');
@endphp
<div class="flex items-start gap-4">
<div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">call</span>
</div>
<div>
<h4 class="font-bold text-lg">Phone</h4>
<p class="text-slate-500">{{ $quotePhone }}</p>
</div>
</div>
<div class="flex items-start gap-4">
<div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">mail</span>
</div>
<div>
<h4 class="font-bold text-lg">Email</h4>
<p class="text-slate-500">{{ $quoteEmail }}</p>
</div>
</div>
<div class="flex items-start gap-4">
<div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined">location_on</span>
</div>
<div>
<h4 class="font-bold text-lg">Main Office</h4>
<p class="text-slate-500">Greater Houston Area, TX</p>
</div>
</div>
</div>
</div>
<div class="bg-white dark:bg-slate-900 p-8 lg:p-12 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-xl">
@if (session('success'))
<div class="mb-6 rounded-xl border border-primary/30 bg-primary/10 p-4 text-sm font-semibold text-slate-900 dark:text-slate-100">
{{ session('success') }}
</div>
@endif
<form class="space-y-6" method="POST" action="{{ route('contact.submit') }}">
@csrf
<input type="hidden" name="source" value="home_quote">
<div class="grid sm:grid-cols-2 gap-6">
<div>
<label class="block text-sm font-bold mb-2">Full Name</label>
<input class="w-full border bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="John Doe" type="text" name="name" required/>
</div>
<div>
<label class="block text-sm font-bold mb-2">Phone Number</label>
<input class="w-full border bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="(000) 000-0000" type="tel" name="phone"/>
</div>
</div>
<div class="grid sm:grid-cols-2 gap-6">
<div>
<label class="block text-sm font-bold mb-2">Pickup Location</label>
<input class="w-full border bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="Zip or City" type="text" name="pickup_location"/>
</div>
<div>
<label class="block text-sm font-bold mb-2">Delivery Destination</label>
<input class="w-full border bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="Zip or City" type="text" name="delivery_location"/>
</div>
</div>
<div>
<label class="block text-sm font-bold mb-2">Message / Special Instructions</label>
<textarea class="w-full border bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg p-3 focus:ring-primary focus:border-primary" placeholder="How can we help you?" rows="4" name="message"></textarea>
</div>
<button class="w-full bg-primary text-background-dark font-black py-4 rounded-xl text-lg hover:brightness-110 transition-all" type="submit">Send Message</button>
</form>
</div>
</div>
</section>
