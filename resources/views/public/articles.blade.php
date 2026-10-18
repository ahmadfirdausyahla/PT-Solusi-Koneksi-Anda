@extends('layouts.app')

@section('title', 'Artikel & Wawasan - PT Solusi Koneksi Anda')

@section('content')
<section class="pt-36 pb-20 px-6 max-w-7xl mx-auto">
    <div class="mb-16 text-center max-w-3xl mx-auto" data-aos="fade-up">
        <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Wawasan Teknologi</span>
        <h1 class="text-4xl md:text-6xl tracking-tight text-slate-900 leading-tight">
            <span class="font-extralight">Artikel &</span> 
            <span class="font-bold text-blue-600">Informasi</span> 
            <span class="font-extralight">Terkini</span>
        </h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($articles as $article)
            <article class="bg-white border border-slate-200/60 rounded-3xl overflow-hidden p-6 flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow" data-aos="fade-up">
                <div>
                    <div class="h-48 rounded-2xl overflow-hidden bg-slate-900 mb-4">
                        <img src="{{ Str::startsWith($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" class="w-full h-full object-cover">
                    </div>
                    <span class="text-xs text-blue-600 font-medium">{{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }}</span>
                    <h3 class="font-bold text-xl mt-1 mb-2 text-slate-900">{{ $article->title }}</h3>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                </div>
            </article>
        @empty
            <p class="text-center text-sm text-slate-500 col-span-3 py-12">Belum ada artikel dipublikasikan.</p>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $articles->links() }}
    </div>
</section>
@endsection