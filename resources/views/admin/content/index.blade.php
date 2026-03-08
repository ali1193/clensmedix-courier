@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold text-white mb-6">Content</h1>
    <p class="text-sm text-slate-400 mb-6">Edit text content for key sections of the site. Defaults come from the current design.</p>

    <form action="{{ route('admin.content.update') }}" method="POST" class="space-y-6">
        @csrf
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl divide-y divide-slate-800">
            @forelse ($blocks as $block)
                <div class="p-4 md:p-5">
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-[0.18em] mb-1">{{ $block->label ?? $block->key }}</p>
                    <p class="text-[11px] text-slate-500 mb-2">{{ $block->key }}</p>
                    <textarea name="blocks[{{ $block->id }}][value]" rows="3" class="w-full rounded-lg border border-slate-700 bg-slate-950 px-3 py-2.5 text-sm text-slate-100 focus:border-primary focus:ring-primary">{{ old("blocks.{$block->id}.value", $block->value) }}</textarea>
                </div>
            @empty
                <p class="p-6 text-sm text-slate-400">Content blocks will appear here once the site is visited and content has been loaded.</p>
            @endforelse
        </div>

        @if ($blocks->isNotEmpty())
            <button type="submit" class="bg-primary text-background-dark font-semibold text-sm rounded-lg px-6 py-2.5 hover:brightness-110 transition">
                Save content
            </button>
        @endif
    </form>
@endsection

