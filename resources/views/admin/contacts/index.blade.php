@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold text-white mb-6">Contact submissions</h1>
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-900/80 text-slate-400 text-xs uppercase tracking-wide">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Contact</th>
                    <th class="px-4 py-3 text-left">Source</th>
                    <th class="px-4 py-3 text-left">Created</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse ($submissions as $submission)
                    <tr>
                        <td class="px-4 py-3 text-slate-100 font-semibold">{{ $submission->name }}</td>
                        <td class="px-4 py-3 text-slate-300">
                            {{ $submission->email ?? $submission->phone }}
                        </td>
                        <td class="px-4 py-3 text-slate-300">{{ $submission->source ?? 'Unknown' }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $submission->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('admin.contacts.show', $submission) }}" class="text-xs text-primary hover:underline">View</a>
                            <form action="{{ route('admin.contacts.destroy', $submission) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-rose-300 hover:underline" onclick="return confirm('Delete this submission?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-sm text-slate-400">No submissions yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $submissions->links() }}
    </div>
@endsection

