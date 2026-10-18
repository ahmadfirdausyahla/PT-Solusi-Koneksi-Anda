@extends('layouts.app')

@section('title', 'Kontak Kami - PT Solusi Koneksi Anda')

@section('content')
<section class="pt-36 pb-20 px-6 max-w-7xl mx-auto">
    <!-- HEADER TITLE -->
    <div class="mb-16 text-center max-w-3xl mx-auto" data-aos="fade-up">
        <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Hubungi Kami</span>
        <h1 class="text-4xl md:text-6xl tracking-tight text-slate-900 leading-tight">
            <span class="font-extralight">Diskusikan</span> 
            <span class="font-bold text-blue-600">Kebutuhan</span> 
            <span class="font-extralight">Sistem & AI Anda</span>
        </h1>
        <p class="text-xs text-slate-500 mt-4 max-w-lg mx-auto leading-relaxed">
            Kirimkan pesan atau pertanyaan seputar integrasi sistem, otomasi industri, dan konsultasi proyek bersama tim profesional kami.
        </p>
    </div>

    <!-- MAIN GRID CONTAINER -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start max-w-6xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        
        <!-- INFORMASI KONTAKS & LOKASI (KIRI - 5 KOLOM) -->
        <div class="lg:col-span-5 bg-slate-900 text-white p-8 md:p-10 rounded-3xl space-y-8 shadow-sm">
            <div>
                <span class="text-[10px] uppercase font-bold text-blue-400 tracking-wider bg-blue-500/10 px-3 py-1 rounded-full border border-blue-500/20">Informasi Perusahaan</span>
                <h2 class="text-xl font-bold mt-4 text-white">PT Solusi Koneksi Anda</h2>
                <p class="text-xs text-slate-400 mt-1 leading-relaxed">Mitra terpercaya perancangan perangkat keras IoT, kecerdasan buatan, dan otomasi industri.</p>
            </div>

            <div class="space-y-5 pt-2 text-xs">
                <div class="flex items-start gap-4">
                    <div class="w-9 h-9 rounded-2xl bg-slate-800 border border-slate-700/80 flex items-center justify-center shrink-0 text-blue-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold block uppercase">Alamat Kantor</span>
                        <p class="text-slate-200 mt-0.5 leading-relaxed">Jl. Raya Pajajaran No. 88 F, Kota Bogor 16153</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-9 h-9 rounded-2xl bg-slate-800 border border-slate-700/80 flex items-center justify-center shrink-0 text-blue-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold block uppercase">Telepon / Hotline</span>
                        <p class="text-slate-200 mt-0.5">+62 251 8000 1234</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-9 h-9 rounded-2xl bg-slate-800 border border-slate-700/80 flex items-center justify-center shrink-0 text-blue-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold block uppercase">Email Resmi</span>
                        <p class="text-slate-200 mt-0.5">info@solusikoneksianda.co.id</p>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-800 flex items-center justify-between text-[11px] text-slate-400">
                <span>Jam Operasional:</span>
                <span class="font-semibold text-slate-200">Senin - Jumat (08.00 - 17.00 WIB)</span>
            </div>
        </div>

        <!-- FORM INPUT PESAN (KANAN - 7 KOLOM) -->
        <div class="lg:col-span-7 bg-white p-8 md:p-10 rounded-3xl border border-slate-200/80 shadow-xs">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold rounded-2xl flex items-center gap-3">
                    <svg class="w-4 h-4 shrink-0 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama Anda..." class="w-full bg-slate-50 border border-slate-200/90 rounded-2xl px-4 py-3 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2">Alamat Email Aktif</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com" class="w-full bg-slate-50 border border-slate-200/90 rounded-2xl px-4 py-3 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Pesan / Konsultasi</label>
                    <textarea name="message" rows="5" required placeholder="Tuliskan detail kebutuhan atau pertanyaan proyek Anda secara lengkap..." class="w-full bg-slate-50 border border-slate-200/90 rounded-2xl p-4 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-all">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-2xl text-xs transition-colors shadow-xs text-center">
                    Kirim Pesan Sekarang
                </button>
            </form>

        </div>

    </div>
</section>
@endsection