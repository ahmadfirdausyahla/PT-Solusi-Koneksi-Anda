@extends('layouts.admin')

@section('title', 'Manajemen Galeri - Admin Panel')

@section('content')
<div class="space-y-6" data-aos="fade-up">
    <!-- Header Page -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs gap-4">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Manajemen Galeri Kegiatan</h1>
            <p class="text-xs text-slate-500 mt-0.5">Kelola dokumentasi foto proyek lapangan dan sistem IoT.</p>
        </div>
        <a href="{{ route('galleries.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-5 py-3 rounded-2xl transition-colors shadow-sm">
            + Tambah Galeri Baru
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table Data -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="text-slate-400 border-b border-slate-100">
                        <th class="pb-3 font-semibold">Foto</th>
                        <th class="pb-3 font-semibold">Judul Dokumentasi</th>
                        <th class="pb-3 font-semibold">Status</th>
                        <th class="pb-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($galleries as $gallery)
                        <tr>
                            <td class="py-4">
                                @if($gallery->image)
                                    <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : asset('storage/' . $gallery->image) }}" class="w-12 h-12 rounded-xl object-cover shadow-xs">
                                @else
                                    <span class="text-[10px] text-slate-400">No Image</span>
                                @endif
                            </td>
                            <td class="py-4 font-bold text-slate-900">{{ $gallery->title }}</td>
                            <td class="py-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-600 uppercase">
                                    {{ $gallery->status ?? 'Published' }}
                                </span>
                            </td>
                            <td class="py-4 text-right space-x-2">
                                <a href="{{ route('galleries.edit', $gallery->id) }}" class="text-blue-600 hover:underline font-semibold">Edit</a>
                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus foto galeri ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:underline font-semibold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-slate-400">Belum ada dokumentasi galeri tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $galleries->links() }}
        </div>
    </div>
</div>
@endsection