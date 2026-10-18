@extends('layouts.app')

@section('title', 'Profil Perusahaan - PT Solusi Koneksi Anda')

@section('content')
<section class="pt-36 pb-20 px-6 max-w-7xl mx-auto">
    <!-- Header Title -->
    <div class="mb-16 text-center max-w-3xl mx-auto" data-aos="fade-up">
        <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Tentang Kami</span>
        <h1 class="text-4xl md:text-6xl tracking-tight text-slate-900 leading-tight">
            <span class="font-extralight">Mengenal Lebih Dekat</span> 
            <span class="font-bold text-blue-600">Solusi Koneksi</span>
        </h1>
    </div>

    <!-- Main Profile Card -->
    <div class="bg-white border border-slate-200/60 rounded-3xl p-8 md:p-12 shadow-sm mb-16" data-aos="fade-up">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 mb-6">
                    {{ $profile->title ?? 'Pelopor Inovasi IoT, Robotika, dan Kecerdasan Buatan di Indonesia' }}
                </h2>
                <div class="space-y-4 text-sm text-slate-600 leading-relaxed">
                    <p>{{ $profile->history ?? 'PT Solusi Koneksi Anda didirikan dengan visi untuk mempercepat transformasi digital industri nasional melalui infrastruktur perangkat keras pintar, sistem otomasi robotik, serta integrasi teknologi berbasis Artificial Intelligence.' }}</p>
                </div>
            </div>
            <div class="rounded-3xl overflow-hidden h-80 bg-slate-900 shadow-lg">
                <img src="{{ Str::startsWith($profile->image, 'http') ? $profile->image : asset('storage/' . $profile->image) }}" class="w-full h-full object-cover opacity-90">
            </div>
        </div>
    </div>

    <!-- Visi & Misi Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up">
        <div class="bg-slate-900 text-white p-10 rounded-3xl shadow-md">
            <h3 class="text-2xl font-bold mb-4 text-blue-400">Visi Perusahaan</h3>
            <p class="text-sm text-slate-300 leading-relaxed">
                {{ $profile->vision ?? 'Menjadi perusahaan teknologi terdepan di Asia Tenggara yang menghadirkan solusi ekosistem pintar mandiri dan berdaya saing global.' }}
            </p>
        </div>
        <div class="bg-white border border-slate-200/60 p-10 rounded-3xl shadow-sm">
            <h3 class="text-2xl font-bold mb-4 text-slate-900">Misi Perusahaan</h3>
            <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line">
                {{ $profile->mission ?? "- Mengembangkan perangkat keras IoT berkualitas tinggi.\n- Menyediakan layanan kustomisasi robotika industri.\n- Mengintegrasikan sistem AI yang aman dan efisien." }}
            </p>
        </div>
    </div>
</section>
@endsection