@extends('layouts.admin')

@section('title', 'Edit Galeri Foto')

@section('content')
<div class="max-w-4xl mx-auto space-y-6" data-aos="fade-up">
    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Edit Galeri Foto</h1>
            <p class="text-xs text-slate-500">Perbarui dokumentasi foto kegiatan atau proyek.</p>
        </div>
        <a href="{{ route('admin.galleries.index') }}" class="px-4 py-2 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors">
            &larr; Kembali
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Judul Foto -->
            <div>
                <label for="title" class="block text-xs font-semibold text-slate-700 mb-1">Judul / Keterangan Foto</label>
                <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Contoh: Instalasi Smart IoT Sensor">
                @error('title') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Status Foto -->
            <div>
                <label for="status" class="block text-xs font-semibold text-slate-700 mb-1">Status Tampil</label>
                <select name="status" id="status" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors">
                    <option value="active" {{ old('status', $gallery->status) == 'active' ? 'selected' : '' }}>Aktif (Ditampilkan)</option>
                    <option value="inactive" {{ old('status', $gallery->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- File Foto -->
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Upload Foto Baru (Opsional)</label>
                @if($gallery->image)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="Preview Foto" class="w-24 h-24 rounded-xl object-cover border border-slate-200">
                        <span class="text-[11px] text-slate-400">Foto saat ini</span>
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors">
                @error('image') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Deskripsi Singkat -->
            <div>
                <label for="description" class="block text-xs font-semibold text-slate-700 mb-1">Deskripsi Tambahan (Opsional)</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Tuliskan catatan singkat tentang foto ini...">{{ old('description', $gallery->description) }}</textarea>
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