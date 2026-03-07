@extends('admin.layout')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-white mb-2">Dashboard</h1>
        <p class="text-sm text-slate-400">Overview of your ClensMedix website activity.</p>
    </div>
    <div class="grid md:grid-cols-3 gap-6 mb-10">
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-5">
            <p class="text-xs uppercase tracking-[0.2em] text-slate-500 mb-1 font-semibold">Services</p>
            <p class="text-3xl font-black text-white">{{ $services_count }}</p>
        </div>
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-5">
            <p class="text-xs uppercase tracking-[0.2em] text-slate-500 mb-1 font-semibold">Contact Requests</p>
            <p class="text-3xl font-black text-white">{{ $contacts_count }}</p>
        </div>
    </div>
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-semibold text-slate-200">Latest contact submissions</h2>
            <a href="{{ route('admin.contacts.index') }}" class="text-xs text-primary hover:underline">View all</a>
        </div>
        @if ($latest_contacts->isEmpty())
            <p class="text-xs text-slate-500">No submissions yet.</p>
        @else
            <ul class="divide-y divide-slate-800 text-sm">
                @foreach ($latest_contacts as $submission)
                    <li class="py-2 flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-slate-100">{{ $submission->name }}</p>
                            <p class="text-xs text-slate-400">{{ $submission->email ?? $submission->phone }} &middot; {{ $submission->created_at->diffForHumans() }}</p>
                        </div>
                        <a href="{{ route('admin.contacts.show', $submission) }}" class="text-xs text-primary hover:underline">View</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

