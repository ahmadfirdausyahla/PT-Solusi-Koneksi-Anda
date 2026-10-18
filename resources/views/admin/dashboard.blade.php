@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="space-y-4" data-aos="fade-up">

    <!-- METRICS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex flex-col justify-between h-36">
            <span class="text-xs font-semibold text-slate-500">Total Layanan</span>
            <div>
                <h2 class="text-3xl font-bold text-slate-900">{{ $totalServices }}</h2>
                <span class="text-[11px] text-blue-600">Terdaftar di Sistem</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex flex-col justify-between h-36">
            <span class="text-xs font-semibold text-slate-500">Artikel Dipublikasi</span>
            <div>
                <h2 class="text-3xl font-bold text-slate-900">{{ $totalArticles }}</h2>
                <a href="{{ route('articles.index') }}" class="text-[11px] font-medium text-slate-400 hover:text-blue-600 block">Kelola Artikel &rarr;</a>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex flex-col justify-between h-36">
            <span class="text-xs font-semibold text-slate-500">Dokumentasi Galeri</span>
            <div>
                <h2 class="text-3xl font-bold text-slate-900">{{ $totalGalleries }}</h2>
                <a href="{{ route('galleries.index') }}" class="text-[11px] font-medium text-slate-400 hover:text-blue-600 block">Lihat Foto &rarr;</a>
            </div>
        </div>

        <div id="messages" class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-xs flex flex-col justify-between h-36">
            <span class="text-xs font-semibold text-slate-500">Pesan Masuk</span>
            <div>
                <h2 class="text-3xl font-bold text-slate-900">{{ $totalMessages }}</h2>
                @if($unreadMessagesCount > 0)
                    <span class="text-[10px] font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full">{{ $unreadMessagesCount }} Belum Dibatasi</span>
                @else
                    <span class="text-[11px] text-emerald-600">Semua Terbaca</span>
                @endif
            </div>
        </div>
    </div>

    <!-- MIDDLE SECTION: DINAMIC CHART & CONTACT MESSAGES CHAT WIDGET -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        
        <!-- Left: Dynamic Chart Visual -->
<div class="lg:col-span-2 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs flex flex-col justify-between">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-sm font-bold text-slate-900">Aktivitas Input Konten (7 Hari Terakhir)</h3>
        <span class="text-xs text-slate-400">Realtime Data</span>
    </div>

    <!-- Dynamic Bar Height Calculation -->
    @php $maxChart = max(max($chartData), 1); @endphp
    <div class="h-48 flex items-end justify-between gap-3 pt-6 px-2">
        @foreach($chartData as $index => $value)
            @php 
                $heightPercent = max(($value / $maxChart) * 100, 15); 
                // Cek apakah item ini adalah hari terakhir/hari ini
                $isToday = $loop->last; 
            @endphp
            <div class="w-full {{ $isToday ? 'bg-blue-600' : 'bg-slate-100' }} hover:bg-blue-600 rounded-2xl transition-all duration-300 relative group" style="height: {{ $heightPercent }}%;">
                <span class="absolute -top-7 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-[10px] px-2 py-0.5 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                    {{ $value }} Data
                </span>
            </div>
        @endforeach
    </div>
    <div class="flex justify-between text-[11px] font-medium mt-3 px-2">
        @foreach($days as $index => $day)
            <span class="{{ $loop->last ? 'text-blue-600 font-bold' : 'text-slate-400' }}">{{ $day }}</span>
        @endforeach
    </div>
</div>

        <!-- Right: Pesan Kontak Masuk (Email Chat System) -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-sm font-bold text-slate-900">Pesan Masuk (Kontak)</h3>
                @if($unreadMessagesCount > 0)
                    <span class="w-2.5 h-2.5 bg-rose-500 rounded-full animate-ping"></span>
                @endif
            </div>
            
            <div class="space-y-3 max-h-64 overflow-y-auto">
                @forelse($recentMessages as $msg)
                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="block p-3 rounded-2xl border border-slate-100 hover:border-blue-500 hover:bg-blue-50/50 transition-colors">
                        <div class="flex justify-between items-start mb-1">
                            <p class="text-xs font-bold text-slate-800">{{ $msg->name }}</p>
                            <span class="text-[9px] text-slate-400">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-[11px] text-slate-600 line-clamp-1">{{ $msg->message }}</p>
                        <div class="mt-2 flex items-center justify-between">
                            <span class="text-[10px] text-slate-400">{{ $msg->email }}</span>
                            @if($msg->replied_at)
                                <span class="text-[9px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">Dibalas</span>
                            @else
                                <span class="text-[9px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-md">Belum Dibalas</span>
                            @endif
                        </div>
                    </a>
                @empty
                    <p class="text-center text-xs text-slate-400 py-6">Belum ada pesan kontak masuk.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- BOTTOM SECTION: ARTIKEL, GALERI, DAN LAYANAN TERBARU -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- 1. Artikel Terbaru -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
            <h3 class="text-sm font-bold text-slate-900 mb-4">Artikel Terbaru</h3>
            <div class="space-y-3">
                @forelse($recentArticles as $art)
                    <div class="p-3 bg-slate-50 rounded-2xl flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-800 line-clamp-1">{{ $art->title }}</p>
                            <p class="text-[10px] text-slate-400">{{ \Carbon\Carbon::parse($art->date)->format('d M Y') }}</p>
                        </div>
                        <a href="{{ route('articles.edit', $art->id) }}" class="text-[11px] text-blue-600 font-semibold">Edit</a>
                    </div>
                @empty
                    <p class="text-xs text-slate-400">Belum ada artikel.</p>
                @endforelse
            </div>
        </div>

        <!-- 2. Galeri Terbaru -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
            <h3 class="text-sm font-bold text-slate-900 mb-4">Galeri Terbaru</h3>
            <div class="space-y-3">
                @forelse($recentGalleries as $gal)
                    <div class="p-3 bg-slate-50 rounded-2xl flex items-center gap-3">
                        <img src="{{ asset('storage/' . $gal->image) }}" class="w-10 h-10 rounded-xl object-cover">
                        <div class="flex-1">
                            <p class="text-xs font-bold text-slate-800 line-clamp-1">{{ $gal->title }}</p>
                            <p class="text-[10px] text-slate-400">{{ $gal->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-slate-400">Belum ada galeri.</p>
                @endforelse
            </div>
        </div>

        <!-- 3. Layanan Terbaru -->
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
            <h3 class="text-sm font-bold text-slate-900 mb-4">Layanan Terbaru</h3>
            <div class="space-y-3">
                @forelse($recentServices as $srv)
                    <div class="p-3 bg-slate-50 rounded-2xl flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-800 line-clamp-1">{{ $srv->name }}</p>
                            <p class="text-[10px] text-blue-600 font-bold">Rp {{ number_format($srv->price, 0, ',', '.') }}</p>
                        </div>
                        <a href="{{ route('services.edit', $srv->id) }}" class="text-[11px] text-blue-600 font-semibold">Edit</a>
                    </div>
                @empty
                    <p class="text-xs text-slate-400">Belum ada layanan.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection