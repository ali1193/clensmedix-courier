@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold text-white mb-6">Add service</h1>
    <form action="{{ route('admin.services.store') }}" method="POST" class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 space-y-4">
        @include('admin.services.form', ['service' => new \App\Models\Service(), 'buttonLabel' => 'Create service'])
    </form>
@endsection

