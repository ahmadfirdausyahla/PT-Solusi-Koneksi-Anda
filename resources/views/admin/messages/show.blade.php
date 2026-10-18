@extends('layouts.admin')

@section('title', 'Detail & Balas Pesan')

@section('content')
<div class="max-w-3xl mx-auto space-y-6" data-aos="fade-up">
    <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-slate-600 hover:text-blue-600">&larr; Kembali ke Dashboard</a>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-xs space-y-6">
        <div class="border-b border-slate-100 pb-4">
            <span class="text-xs uppercase text-blue-600 font-bold block mb-1">Pesan Kontak Masuk</span>
            <h1 class="text-xl font-bold text-slate-900">{{ $message->name }}</h1>
            <p class="text-xs text-slate-400">{{ $message->email }} &bull; {{ $message->created_at->format('d F Y, H:i') }} WIB</p>
        </div>

        <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100">
            <p class="text-xs text-slate-500 font-bold mb-2">Pesan Pengunjung:</p>
            <p class="text-sm text-slate-800 leading-relaxed">{{ $message->message }}</p>
        </div>

        <!-- Form Balas Email -->
        <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">Balas Langsung ke Email Pengirim:</label>
                <textarea name="reply_message" rows="5" required placeholder="Tuliskan pesan balasan Anda di sini..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-xs text-slate-800 focus:outline-none focus:border-blue-600">{{ $message->reply_message }}</textarea>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-2xl text-xs transition-colors shadow-sm">
                Kirim Balasan Email
            </button>
        </form>
    </div>
</div>
@endsection