@extends('layouts.admin')

@section('title', 'Pesan Masuk - Admin Panel')

@section('content')
<div class="space-y-6" data-aos="fade-up">
    <!-- Header -->
    <div class="flex justify-between items-center bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Pesan Masuk (Inquiries)</h1>
            <p class="text-xs text-slate-500 mt-0.5">Daftar pertanyaan dan konsultasi umum dari pengunjung website.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data Pesan -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="text-slate-400 border-b border-slate-100">
                        <th class="pb-3 font-semibold">Nama Pengirim</th>
                        <th class="pb-3 font-semibold">Email</th>
                        <th class="pb-3 font-semibold">Pesan</th>
                        <th class="pb-3 font-semibold">Tanggal</th>
                        <th class="pb-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($messages as $msg)
                        <tr>
                            <td class="py-4 font-bold text-slate-900">{{ $msg->name }}</td>
                            <td class="py-4 text-slate-600">{{ $msg->email }}</td>
                            <td class="py-4 text-slate-500 max-w-sm truncate">{{ $msg->message }}</td>
                            <td class="py-4 text-slate-400">{{ $msg->created_at->format('d M Y, H:i') }}</td>
                            <td class="py-4 text-right space-x-2">
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-blue-600 hover:underline font-semibold">Balas</a>
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pesan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400">Belum ada pesan kontak masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection