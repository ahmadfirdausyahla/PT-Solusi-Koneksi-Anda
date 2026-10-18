@extends('layouts.app')

@section('title', 'Galeri Kegiatan - PT Solusi Koneksi Anda')

@section('content')
<section class="pt-36 pb-20 px-6 max-w-7xl mx-auto">
    <div class="mb-16 text-center max-w-3xl mx-auto" data-aos="fade-up">
        <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Dokumentasi Proyek</span>
        <h1 class="text-4xl md:text-6xl tracking-tight text-slate-900 leading-tight">
            <span class="font-extralight">Galeri</span> 
            <span class="font-bold text-blue-600">Kegiatan</span> 
            <span class="font-extralight">& Lapangan</span>
        </h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($galleries as $gallery)
            <div class="bg-white p-4 rounded-3xl border border-slate-200/60 shadow-sm" data-aos="fade-up">
                <div class="h-64 rounded-2xl overflow-hidden bg-slate-900 mb-4">
                    <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/' . $gallery->image) }}" class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold text-lg text-slate-900 px-2">{{ $gallery->title }}</h3>
            </div>
        @empty
            <p class="text-center text-sm text-slate-500 col-span-3 py-12">Belum ada galeri kegiatan.</p>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $galleries->links() }}
    </div>
</section>
@endsection