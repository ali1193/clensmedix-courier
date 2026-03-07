@csrf
<div class="grid md:grid-cols-2 gap-4 text-sm">
    <div class="space-y-1.5">
        <label class="font-semibold text-slate-200">Name</label>
        <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}" required class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
    </div>
    <div class="space-y-1.5">
        <label class="font-semibold text-slate-200">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $service->slug ?? '') }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
        <p class="text-[11px] text-slate-500">Optional. Used in URLs; if left blank it will be generated from the name.</p>
    </div>
    <div class="space-y-1.5">
        <label class="font-semibold text-slate-200">Category</label>
        <input type="text" name="category" value="{{ old('category', $service->category ?? '') }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
    </div>
    <div class="space-y-1.5">
        <label class="font-semibold text-slate-200">Image URL</label>
        <input type="text" name="image_url" value="{{ old('image_url', $service->image_url ?? '') }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
    </div>
    <div class="space-y-1.5">
        <label class="font-semibold text-slate-200">Display order</label>
        <input type="number" name="display_order" value="{{ old('display_order', $service->display_order ?? 0) }}" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">
    </div>
    <div class="space-y-1.5">
        <label class="font-semibold text-slate-200">Visible</label>
        <label class="inline-flex items-center gap-2 text-xs text-slate-300 mt-1.5">
            <input type="checkbox" name="is_active" value="1" class="rounded border-slate-600 bg-slate-900 text-primary" {{ old('is_active', ($service->is_active ?? true)) ? 'checked' : '' }}>
            <span>Show this service on the public site</span>
        </label>
    </div>
</div>
<div class="mt-6 grid md:grid-cols-2 gap-4 text-sm">
    <div class="space-y-1.5">
        <label class="font-semibold text-slate-200">Short excerpt</label>
        <textarea name="excerpt" rows="3" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">{{ old('excerpt', $service->excerpt ?? '') }}</textarea>
    </div>
    <div class="space-y-1.5 md:col-span-2">
        <label class="font-semibold text-slate-200">Full description</label>
        <textarea name="description" rows="6" class="w-full rounded-lg border border-slate-700 bg-slate-900 px-3 py-2.5 text-sm focus:border-primary focus:ring-primary">{{ old('description', $service->description ?? '') }}</textarea>
    </div>
</div>
<div class="mt-6">
    <button type="submit" class="bg-primary text-background-dark font-semibold text-sm rounded-lg px-6 py-2.5 hover:brightness-110 transition">
        {{ $buttonLabel }}
    </button>
</div>

