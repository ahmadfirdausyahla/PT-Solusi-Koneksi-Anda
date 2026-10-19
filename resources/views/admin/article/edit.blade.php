@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="max-w-4xl mx-auto space-y-6" data-aos="fade-up">
    <!-- HEADER -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-slate-900">Edit Artikel</h1>
            <p class="text-xs text-slate-500">Perbarui konten artikel atau berita perusahaan.</p>
        </div>
        <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors">
            &larr; Kembali
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Judul Artikel -->
            <div>
                <label for="title" class="block text-xs font-semibold text-slate-700 mb-1">Judul Artikel</label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Masukkan judul artikel">
                @error('title') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Tanggal & Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="date" class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Publikasi</label>
                    <input type="date" name="date" id="date" value="{{ old('date', $article->date) }}" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors">
                    @error('date') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="status" class="block text-xs font-semibold text-slate-700 mb-1">Status Publikasi</label>
                    <select name="status" id="status" class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors">
                        <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                    @error('status') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Gambar / Cover -->
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Gambar Utama</label>
                @if($article->image)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Preview" class="w-20 h-20 rounded-xl object-cover border border-slate-200">
                        <span class="text-[11px] text-slate-400">Gambar saat ini</span>
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors">
                @error('image') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Isi Konten Artikel -->
            <div>
                <label for="content" class="block text-xs font-semibold text-slate-700 mb-1">Konten Artikel</label>
                <textarea name="content" id="content" rows="8" required class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Tuliskan isi artikel lengkap di sini...">{{ old('content', $article->content) }}</textarea>
                @error('content') <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
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