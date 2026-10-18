@extends('layouts.app')

@section('title', 'Layanan - PT Solusi Koneksi Anda')

@section('content')
<section class="pt-36 pb-20 px-6 max-w-7xl mx-auto">
    <div class="mb-16 text-center max-w-3xl mx-auto" data-aos="fade-up">
        <span class="text-xs uppercase tracking-widest text-blue-600 font-semibold mb-2 block">Solusi Terintegrasi</span>
        <h1 class="text-4xl md:text-6xl tracking-tight text-slate-900 leading-tight">
            <span class="font-extralight">Daftar</span> 
            <span class="font-bold text-blue-600">Layanan</span> 
            <span class="font-extralight">Profesional</span>
        </h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($services as $service)
            <div class="bg-white border border-slate-200/60 rounded-3xl p-8 shadow-sm flex flex-col justify-between hover:border-blue-500 transition-colors" data-aos="fade-up">
                <div>
                    @if($service->image)
    <div class="h-48 rounded-2xl overflow-hidden bg-slate-900 mb-6">
        <img src="{{ Str::startsWith($service->image, 'http') ? $service->image : asset('storage/' . $service->image) }}" class="w-full h-full object-cover">
    </div>
@endif
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">{{ $service->name }}</h3>
                    <p class="text-sm text-slate-600 leading-relaxed mb-6">{{ $service->description }}</p>
                </div>
                <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-lg font-bold text-blue-600">Rp {{ number_format($service->price, 0, ',', '.') }}</span>
                    
                    <!-- UBAH DI BAGIAN INI: Mengarahkan ke form order dinamis berdasarkan ID Layanan -->
                    <a href="{{ route('services.order.form', $service->id) }}" class="bg-slate-900 hover:bg-blue-600 text-white text-xs font-semibold px-4 py-2.5 rounded-full transition-colors">
                        Pesan Layanan
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-sm text-slate-500 col-span-3 py-12">Belum ada layanan tersedia.</p>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $services->links() }}
    </div>
</section>
@endsection