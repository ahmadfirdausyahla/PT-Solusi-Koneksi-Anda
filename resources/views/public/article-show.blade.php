@extends('layouts.app')

@section('title', $article->title . ' - PT Solusi Koneksi Anda')

@section('content')
<section class="pt-36 pb-20 px-6 max-w-4xl mx-auto">
    <!-- Tombol Kembali -->
    <div class="mb-8" data-aos="fade-right">
        <a href="{{ route('articles.public') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Artikel Lainnya
        </a>
    </div>

    <article class="bg-white border border-slate-200/60 rounded-3xl p-8 md:p-12 shadow-sm" data-aos="fade-up">
        <div class="mb-6 flex items-center gap-3">
            <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold">Wawasan & Teknologi</span>
            <span class="text-slate-300">&bull;</span>
            <span class="text-xs text-slate-500 font-medium">{{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }}</span>
        </div>

        <h1 class="text-3xl md:text-5xl font-bold tracking-tight text-slate-900 leading-tight mb-8">{{ $article->title }}</h1>

        @if($article->image)
            <div class="h-80 md:h-[450px] rounded-2xl overflow-hidden bg-slate-900 mb-10 shadow-md">
                <img src="{{ Str::startsWith($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="text-slate-700 leading-relaxed space-y-6 text-base md:text-lg">
            {!! nl2br(e($article->content)) !!}
        </div>
    </article>
</section>
@endsection