@extends('layouts.app')

@section('title', $gallery->title . ' - PT Solusi Koneksi Anda')

@section('content')
<section class="pt-36 pb-20 px-6 max-w-5xl mx-auto">
    <!-- Tombol Kembali -->
    <div class="mb-8" data-aos="fade-right">
        <a href="{{ route('galleries.public') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Galeri Kegiatan
        </a>
    </div>

    <div class="bg-white border border-slate-200/60 rounded-3xl p-8 md:p-12 shadow-sm text-center" data-aos="fade-up">
        <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Dokumentasi Lapangan</span>
        <h1 class="text-2xl md:text-4xl font-bold tracking-tight text-slate-900 mb-8">{{ $gallery->title }}</h1>

        @if($gallery->image)
            <div class="rounded-2xl overflow-hidden bg-slate-900 shadow-xl max-h-[600px] flex items-center justify-center mb-8">
                <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/' . $gallery->image) }}" class="w-full h-auto object-contain max-h-[600px]">
            </div>
        @endif

        <div class="flex justify-center items-center gap-4 text-xs text-slate-500 font-medium">
            <span>Status: <strong class="text-slate-700 uppercase">{{ $gallery->status }}</strong></span>
            <span>&bull;</span>
            <span>Dipublikasikan pada: {{ $gallery->created_at->translatedFormat('d F Y') }}</span>
        </div>
    </div>
</section>
@endsection