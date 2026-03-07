@extends('admin.layout')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Services</h1>
            <p class="text-sm text-slate-400">Manage the services shown on the public Services page.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="bg-primary text-background-dark text-sm font-semibold px-4 py-2 rounded-lg hover:brightness-110 transition">
            Add service
        </a>
    </div>
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-900/80 text-slate-400 text-xs uppercase tracking-wide">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Order</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @forelse ($services as $service)
                    <tr>
                        <td class="px-4 py-3 text-slate-100 font-semibold">{{ $service->name }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $service->category }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $service->display_order }}</td>
                        <td class="px-4 py-3">
                            @if ($service->is_active)
                                <span class="inline-flex items-center rounded-full bg-emerald-500/10 px-2 py-0.5 text-[11px] font-semibold text-emerald-300">Active</span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-slate-700/60 px-2 py-0.5 text-[11px] font-semibold text-slate-200">Hidden</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('admin.services.edit', $service) }}" class="text-xs text-primary hover:underline">Edit</a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-rose-300 hover:underline" onclick="return confirm('Delete this service?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-sm text-slate-400">No services defined yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

