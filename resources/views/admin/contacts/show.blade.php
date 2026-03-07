@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold text-white mb-6">Contact submission</h1>
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 text-sm space-y-4">
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <p class="text-xs font-semibold text-slate-400">Name</p>
                <p class="text-slate-100 font-semibold">{{ $submission->name }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400">Email</p>
                <p class="text-slate-100">{{ $submission->email ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400">Phone</p>
                <p class="text-slate-100">{{ $submission->phone ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400">Source</p>
                <p class="text-slate-100">{{ $submission->source ?? 'Unknown' }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400">Pickup location</p>
                <p class="text-slate-100">{{ $submission->pickup_location ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400">Delivery location</p>
                <p class="text-slate-100">{{ $submission->delivery_location ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400">Package type</p>
                <p class="text-slate-100">{{ $submission->package_type ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400">Preferred pickup time</p>
                <p class="text-slate-100">{{ $submission->preferred_pickup_time ?? '—' }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="text-xs font-semibold text-slate-400 mb-1">Message</p>
                <p class="text-slate-100 whitespace-pre-line">{{ $submission->message ?? '—' }}</p>
            </div>
        </div>
        <div class="flex justify-between pt-4 border-t border-slate-800">
            <p class="text-xs text-slate-500">Submitted {{ $submission->created_at->format('Y-m-d H:i') }}</p>
            <form action="{{ route('admin.contacts.destroy', $submission) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs text-rose-300 hover:underline" onclick="return confirm('Delete this submission?')">Delete</button>
            </form>
        </div>
    </div>
@endsection

