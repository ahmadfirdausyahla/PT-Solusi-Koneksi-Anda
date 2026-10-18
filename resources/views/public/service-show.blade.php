@extends('layouts.app')

@section('title', $service->name . ' - PT Solusi Koneksi Anda')

@section('content')
<section class="pt-36 pb-20 px-6 max-w-5xl mx-auto">
    <!-- Tombol Kembali -->
    <div class="mb-8" data-aos="fade-right">
        <a href="{{ route('services.public') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Daftar Layanan
        </a>
    </div>

    <div class="bg-white border border-slate-200/60 rounded-3xl p-8 md:p-12 shadow-sm" data-aos="fade-up">
        @if($service->image)
            <div class="h-80 md:h-96 rounded-2xl overflow-hidden bg-slate-900 mb-8 shadow-md">
                <img src="{{ Str::startsWith($service->image, 'http') ? $service->image : asset('storage/' . $service->image) }}" class="w-full h-full object-cover">
            </div>
        @endif

        <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Layanan Profesional IoT</span>
        <h1 class="text-3xl md:text-5xl font-bold tracking-tight text-slate-900 mb-6">{{ $service->name }}</h1>
        
        <div class="flex items-center gap-4 mb-8 pb-6 border-b border-slate-100">
            <span class="text-2xl font-bold text-blue-600">Rp {{ number_format($service->price, 0, ',', '.') }}</span>
            <span class="text-xs px-3 py-1 bg-blue-50 text-blue-600 rounded-full font-medium">Aktif & Tersedia</span>
        </div>

        <div class="prose max-w-none text-slate-600 leading-relaxed space-y-4 mb-10">
            <p>{{ $service->description }}</p>
        </div>

        <div class="flex items-center gap-4">
            <a href="{{ route('services.order.form', $service->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-6 py-3.5 rounded-2xl transition-colors shadow-sm">
                Pesan Layanan Ini
            </a>
        </div>
    </div>
</section>
@endsection