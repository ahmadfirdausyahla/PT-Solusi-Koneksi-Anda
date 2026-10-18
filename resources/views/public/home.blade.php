@extends('layouts.app')

@section('title', 'Home - PT Solusi Koneksi Anda')

@section('content')
<!-- CSS Animasi Sway Galeri -->
<style>
    @keyframes swaySlow {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(1deg); }
    }
    .animate-sway-1 { animation: swaySlow 6s ease-in-out infinite; }
    .animate-sway-2 { animation: swaySlow 7s ease-in-out infinite 1s; }
    .animate-sway-3 { animation: swaySlow 8s ease-in-out infinite 2s; }
</style>

<!-- HERO SECTION -->
<section class="pt-36 pb-20 px-6 max-w-7xl mx-auto">
    <div class="mb-12" data-aos="fade-up">
        <h1 class="text-5xl md:text-7xl tracking-tight leading-tight max-w-5xl text-slate-900">
            <span class="font-extralight">Membangun</span> 
            <span class="font-bold text-blue-600">Ekosistem</span> 
            <span class="font-extralight">Pintar &</span> 
            <span class="font-bold">Robotika</span> 
            <span class="font-extralight">Masa Depan</span>
        </h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end" data-aos="fade-up" data-aos-delay="200">
        <div class="rounded-3xl overflow-hidden h-72 shadow-md bg-slate-900">
            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=1000" class="w-full h-full object-cover opacity-90">
        </div>
        <div class="rounded-3xl overflow-hidden h-96 shadow-lg bg-slate-900">
            <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?q=80&w=1000" class="w-full h-full object-cover opacity-90">
        </div>
        <div class="rounded-3xl overflow-hidden h-80 shadow-md bg-slate-900">
            <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=1000" class="w-full h-full object-cover opacity-90">
        </div>
    </div>
</section>

<!-- SECTION PROFIL -->
<section class="py-20 px-6 max-w-7xl mx-auto border-t border-slate-200/60" data-aos="fade-up">
    <div class="max-w-3xl mb-12">
        <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Profil Perusahaan</span>
        <h2 class="text-3xl md:text-4xl tracking-tight text-slate-900 leading-relaxed">
            <span class="font-extralight">Menghadirkan</span> 
            <span class="font-bold text-blue-600">Inovasi</span> 
            <span class="font-extralight">Perangkat Keras &</span> 
            <span class="font-bold">Kecerdasan Buatan</span>.
        </h2>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 bg-white border border-slate-200/60 p-10 rounded-3xl shadow-xs" data-aos="zoom-in">
        <div>
            <h3 class="text-4xl font-bold text-blue-600 mb-2">
                <span class="counter" data-target="50">0</span>+
            </h3>
            <p class="text-sm text-slate-600">Modul Perangkat IoT & Sensor Pintar Terdistribusi.</p>
        </div>
        <div>
            <h3 class="text-4xl font-bold text-blue-600 mb-2">Custom</h3>
            <p class="text-sm text-slate-600">Perancangan Robot Otomasi & AI Solution sesuai kebutuhan.</p>
        </div>
        <div>
            <h3 class="text-4xl font-bold text-blue-600 mb-2">
                <span class="counter" data-target="24">0</span>/7
            </h3>
            <p class="text-sm text-slate-600">Monitoring sistem cloud real-time dengan keamanan tinggi.</p>
        </div>
    </div>
</section>

<!-- SECTION LAYANAN (Dibuat Proporsional, Grid 3 Kolom, Modern) -->
<section class="py-20 px-6 max-w-7xl mx-auto" data-aos="fade-up">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
        <div>
            <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Solusi Terintegrasi</span>
            <h2 class="text-4xl font-bold tracking-tight text-slate-900">
                <span class="font-extralight">Layanan</span> <span class="font-bold">Kami</span>
            </h2>
        </div>
        <a href="{{ route('services.public') }}" class="inline-flex items-center gap-2 text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors">
            Lihat Semua Layanan
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>

    <!-- GRID LAYANAN UNIFORM & CLEAN -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($services as $service)
            <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-xs flex flex-col justify-between hover:border-blue-500 transition-all duration-300 group" data-aos="fade-up">
                <div class="space-y-4">
                    @if($service->image)
                        <div class="h-44 rounded-2xl overflow-hidden bg-slate-100 shadow-inner">
                            <img src="{{ Str::startsWith($service->image, 'http') ? $service->image : asset('storage/' . $service->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    @endif
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-blue-600 transition-colors">{{ $service->name }}</h3>
                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">{{ $service->description }}</p>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-slate-400 block font-semibold uppercase">Mulai Dari</span>
                        <span class="text-base font-bold text-blue-600">Rp {{ number_format($service->price, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('services.order.form', $service->id) }}" class="bg-slate-900 hover:bg-blue-600 text-white text-xs font-semibold px-4 py-2.5 rounded-full transition-colors shadow-xs">
                        Pesan Layanan
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-sm text-slate-400 col-span-3 py-12">Belum ada layanan terdaftar.</p>
        @endforelse
    </div>
</section>

<!-- MARQUEE ANIMATION -->
<section class="py-16 bg-slate-900 text-white overflow-hidden my-12" data-aos="fade">
    <div class="flex overflow-hidden whitespace-nowrap">
        <div class="animate-marquee flex items-center space-x-12">
            <span class="text-5xl md:text-7xl font-bold tracking-tight uppercase opacity-20">IOT & ROBOTICS SOLUTION &bull; ARTIFICIAL INTELLIGENCE &bull;</span>
            <span class="text-5xl md:text-7xl font-bold tracking-tight uppercase opacity-20">IOT & ROBOTICS SOLUTION &bull; ARTIFICIAL INTELLIGENCE &bull;</span>
        </div>
    </div>
</section>

<!-- SECTION GALERI -->
<section class="py-28 px-6 max-w-7xl mx-auto overflow-hidden relative" data-aos="fade-up">
    <div class="text-center mb-4 relative z-20">
        <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Dokumentasi Proyek</span>
        <h2 class="text-4xl font-bold tracking-tight text-slate-900">
            <span class="font-extralight">Galeri</span> <span class="font-bold">Kegiatan</span>
        </h2>
    </div>

    <div class="relative max-w-5xl mx-auto pt-10 pb-16">
        <div class="absolute inset-x-0 top-0 flex flex-col items-center justify-center pointer-events-none z-0">
            <h3 class="text-7xl md:text-[14rem] font-black tracking-tighter text-slate-900/[0.04] uppercase text-center leading-none select-none">
                BUILDING<br>SPACE
            </h3>
        </div>

        <div class="relative z-10 grid grid-cols-1 md:grid-cols-3 gap-6 pt-16 items-center">
            @forelse($galleries as $index => $gallery)
                <div class="bg-white p-4 rounded-3xl shadow-xl border border-slate-200/80 {{ $index == 0 ? 'animate-sway-1' : ($index == 1 ? 'animate-sway-2 md:-translate-y-6' : 'animate-sway-3') }}">
                    <div class="h-56 rounded-2xl overflow-hidden bg-slate-900 mb-3">
                        <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/' . $gallery->image) }}" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold text-base text-slate-900 px-1 truncate">{{ $gallery->title }}</h4>
                </div>
            @empty
                <p class="text-center text-sm text-slate-500 col-span-3">Belum ada galeri kegiatan dari database.</p>
            @endforelse
        </div>

        <div class="text-center mt-16 relative z-20">
            <a href="{{ route('galleries.public') }}" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-blue-600 text-white font-medium px-6 py-3 rounded-full text-sm transition-all duration-300 shadow-md">
                Lihat Galeri Lebih Banyak
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- SECTION ARTIKEL -->
<section class="py-20 px-6 max-w-7xl mx-auto border-t border-slate-200/60" data-aos="fade-up">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
        <div>
            <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Wawasan & Teknologi</span>
            <h2 class="text-4xl font-bold tracking-tight text-slate-900">
                <span class="font-extralight">Artikel</span> <span class="font-bold">Terkini</span>
            </h2>
        </div>
        <a href="{{ route('articles.public') }}" class="inline-flex items-center gap-2 text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors">
            Lihat Artikel Lebih Banyak
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($articles as $article)
            <a href="{{ route('articles.show', $article->id) }}" class="bg-white border border-slate-200/60 rounded-3xl overflow-hidden p-5 flex flex-col justify-between shadow-xs hover:shadow-md hover:border-blue-500 transition-all duration-300 group" data-aos="fade-up">
                <div>
                    @if($article->image)
                        <div class="h-48 rounded-2xl overflow-hidden bg-slate-900 mb-4">
                            <img src="{{ Str::startsWith($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    @endif
                    <span class="text-xs text-blue-600 font-medium">{{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }}</span>
                    <h3 class="font-bold text-lg mt-1 mb-2 text-slate-900 group-hover:text-blue-600 transition-colors">{{ $article->title }}</h3>
                    <p class="text-xs text-slate-600 line-clamp-3">{{ Str::limit(strip_tags($article->content), 90) }}</p>
                </div>
                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-blue-600">
                    <span>Baca Selengkapnya</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>
        @empty
            <p class="text-center text-sm text-slate-500 col-span-3">Belum ada artikel dipublikasikan.</p>
        @endforelse
    </div>
</section>

<!-- SECTION KONTAK (TERKONEKSI KE DATABASE & ADMIN MESSAGES) -->
<section class="py-20 px-6 max-w-7xl mx-auto" data-aos="fade-up">
    <div class="bg-slate-900 text-white rounded-3xl p-10 md:p-16 flex flex-col md:flex-row gap-12 justify-between shadow-lg">
        <div class="max-w-md">
            <span class="text-xs uppercase tracking-widest text-blue-400 font-semibold mb-2 block">Hubungi Kami</span>
            <h2 class="text-4xl font-bold tracking-tight mb-6">Mulai Konsultasi Sistem IoT & Robotika Anda</h2>
            <div class="space-y-4 text-sm text-slate-300">
                <p class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Jl. Raya Pajajaran No. 88 F, Kota Bogor 16153
                </p>
                <p class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    +62 251 8000 1234
                </p>
                <p class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-blue-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    info@solusikoneksianda.co.id
                </p>
            </div>
        </div>

        <!-- FORM KIRIM PESAN -->
        <div class="w-full md:w-1/2 space-y-4">
            @if(session('success'))
                <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs rounded-2xl">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Nama Lengkap" class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-3.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-blue-500">
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="Alamat Email" class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-3.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-blue-500">
                <textarea name="message" rows="4" required placeholder="Detail Proyek / Pesan Anda..." class="w-full bg-slate-800 border border-slate-700 rounded-2xl px-5 py-3.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-blue-500">{{ old('message') }}</textarea>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-2xl text-xs transition-colors shadow-xs">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection