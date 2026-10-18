@extends('layouts.admin')

@section('title', 'Pesanan Layanan - Admin Panel')

@section('content')
<div class="space-y-6" data-aos="fade-up">
    <!-- Header -->
    <div class="flex justify-between items-center bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Daftar Pesanan Layanan</h1>
            <p class="text-xs text-slate-500 mt-0.5">Permintaan order layanan IoT & AI dari calon klien melalui website.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data Orders -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="text-slate-400 border-b border-slate-100">
                        <th class="pb-3 font-semibold">Nama Klien / Instansi</th>
                        <th class="pb-3 font-semibold">Layanan Dipesan</th>
                        <th class="pb-3 font-semibold">Kontak</th>
                        <th class="pb-3 font-semibold">Catatan Khusus</th>
                        <th class="pb-3 font-semibold">Tanggal Order</th>
                        <th class="pb-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($orders as $order)
                        <tr>
                            <td class="py-4 font-bold text-slate-900">{{ $order->name }}</td>
                            <td class="py-4 font-bold text-blue-600">
                                {{ $order->service->name ?? 'Layanan Tidak Ditemukan' }}
                            </td>
                            <td class="py-4 text-slate-600">
                                <div class="font-medium">{{ $order->phone }}</div>
                                <div class="text-[10px] text-slate-400">{{ $order->email }}</div>
                            </td>
                            <td class="py-4 text-slate-500 max-w-xs truncate">
                                {{ $order->notes ?? '-' }}
                            </td>
                            <td class="py-4 text-slate-400">
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="py-4 text-right space-x-2">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone) }}" target="_blank" class="text-emerald-600 hover:underline font-semibold">
                                    Chat WA
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pesanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline font-semibold">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">
                                Belum ada pesanan layanan yang masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection