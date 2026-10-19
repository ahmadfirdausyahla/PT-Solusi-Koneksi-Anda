@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')
<div class="max-w-4xl mx-auto space-y-6" data-aos="fade-up">
    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Edit Layanan</h1>
            <p class="text-xs text-slate-500">Perbarui rincian produk/layanan yang ditawarkan.</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="px-4 py-2 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors">
            &larr; Kembali
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama Layanan & Harga -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-xs font-semibold text-slate-700 mb-1">Nama Layanan</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Contoh: Perancangan IoT Industrial">
                    @error('name') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="price" class="block text-xs font-semibold text-slate-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="0">
                    @error('price') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Status Tampil -->
            <div>
                <label for="status" class="block text-xs font-semibold text-slate-700 mb-1">Status Layanan</label>
                <select name="status" id="status" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors">
                    <option value="1" {{ old('status', $service->status) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status', $service->status) == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Foto / Ikon Layanan -->
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Gambar / Ikon Layanan (Opsional)</label>
                @if($service->image)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="Preview Layanan" class="w-20 h-20 rounded-xl object-cover border border-slate-200">
                        <span class="text-[11px] text-slate-400">Gambar saat ini</span>
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors">
                @error('image') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Deskripsi Layanan -->
            <div>
                <label for="description" class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi Lengkap Layanan</label>
                <textarea name="description" id="description" rows="5" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Jelaskan detail spesifikasi dan keuntungan dari layanan ini...">{{ old('description', $service->description) }}</textarea>
                @error('description') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- TOMBOL SIMPAN -->
            <div class="flex justify-end pt-3">
                <button type="submit" class="px-6 py-2.5 text-xs font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition-colors shadow-xs">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection